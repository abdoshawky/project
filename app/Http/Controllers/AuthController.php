<?php

namespace App\Http\Controllers;


use App\AccountSettings;
use App\Company;
use App\Notifications\RegisterNotification;
use App\Notifications\ForgetPasswordNotification;
use App\UserActivation;
use App\City;
use App\User;
use App\Classification;

use App\UserDevices;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use League\Flysystem\Exception;

use Auth;
use Validator;
use Notification;
use Hash;


class AuthController extends Controller
{
    /**
     * user login
     * @param $type
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login($type, Request $request){
        $input = $request->all();
        $rules = [
            'email'     => 'required',
            'password'  => 'required',
            'player_id' => 'required',
        ];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            $errors = $validation->errors()->first();
            return json_response($errors, 402);
        }else{
            $guard = $type == 'user' ? 'web' : 'company';
            if(Auth::guard($guard)->attempt(['email'=>$input['email'],'password'=>$input['password']])){
                $user = Auth::guard($guard)->user();
                if($type == 'user')
                    $user->image = url('images/normal/'.$user->image);
                elseif ($type == 'company')
                    $user->logo = url('images/normal/'.$user->logo);

                if(UserDevices::where('account_id',$user->id())
                    ->where('account_type',get_class($user))
                    ->where('player_id',$input['player_id'])
                    ->count() == 0
                ){
                    // add this device to user devices
                    UserDevices::create([
                        'account_id'    => $user->id,
                        'account_type'  => get_class($user),
                        'player_id'     => $input['player_id'],
                    ]);
                }

                $response = [
                    'user'      => $user,
                    'api_token' => $user->api_token,
                ];
                return json_response($response, 200);
            }else{
                return json_response([], 103);
            }
        }
    }

    /**
     * register a new account
     * @param Request $request
     * @param $type ( user - company )
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request, $type){
        $cities             = City::pluck('id')->all();
        $classifications    = Classification::pluck('id')->all();

        $input = $request->all();
        if($type == 'user'){
            $model = new User;

            // set the validation rules
            $rules = [
                'firstname'     => 'required|max:190',
                'lastname'      => 'required|max:190',
                'email'         => 'required|email|unique:users,email',
                'password'      => 'required|min:8',
                'player_id'     => 'required',
                'city_id'       => [
                    'required',
                    Rule::in($cities),
                ]
            ];

            $validation = Validator::make($input, $rules);
            if($validation->fails()){
                $errors = $validation->errors()->first();
                return json_response($errors, 402);
            }

            // prepare the data to store
            $data = [
                'firstname' => $input['firstname'],
                'lastname'  => $input['lastname'],
                'email'     => $input['email'],
                'password'  => bcrypt($input['password']),
                'city_id'   => $input['city_id'],
            ];

            $image = 'default_user.png';
            if($request->hasFile('image')){
                $image = uploadImage($request->file('image'),'uploaded/users/');
            }
            $data['image'] = $image;

            // add the optional attributes
            $optional = ['phone','age','gender'];
            foreach ($optional as $option){
                if($request->has($option))
                    $data[$option] = $input[$option];
            }

        }elseif($type == 'company'){
            $model = new Company;

            // set the validation rules
            $rules = [
                'company_name'      => 'required|max:190',
                'owner_name'        => 'required|max:190',
                'email'             => 'required|email|unique:companies,email',
                'password'          => 'required|min:8',
                'player_id'         => 'required',
                'city_id'           => [
                    'required',
                    Rule::in($cities),
                ],
                'classification_id'  => [
                    'required',
                    Rule::in($classifications),
                ]
            ];

            $validation = Validator::make($input, $rules);
            if($validation->fails()){
                $errors = $validation->errors()->first();
                return json_response($errors, 402);
            }

            // prepare the data to store
            $data = [
                'company_name'          => $input['company_name'],
                'owner_name'            => $input['owner_name'],
                'email'                 => $input['email'],
                'password'              => bcrypt($input['password']),
                'city_id'               => $input['city_id'],
                'classification_id'     => $input['classification_id'],
            ];

            $image = 'default_company.png';
            if($request->hasFile('logo')){
                $image = uploadImage($request->file('logo'),'uploaded/companies/');
            }
            $data['logo'] = $image;

            $optional = ['phone','street','founded_at'];
            foreach ($optional as $option){
                if($request->has($option))
                    $data[$option] = $input[$option];
            }

        }else{
            return json_response([], 400);
        }

        $api_token = str_random(60);
        while ( count( $model->where('api_token',$api_token)->first()) != 0 ) {
            $api_token = str_random(60);
        }
        $data['api_token']  = $api_token;
        try{
            $user = $model::create($data);
            if($user){
                $user = $model::find($user->id);
                $user->image = url('/images/normal/'.$user->image);

                // set the default account settings
                AccountSettings::create(['account_type'=>get_class($user), 'account_id'=>$user->id]);

                // save the user device
                UserDevices::create(['account_type'=>get_class($user), 'account_id'=>$user->id, 'player_id'=>$input['player_id']]);

                // generate the activation code
                $code = randomNumber(4);
                while (UserActivation::where('activation_code',$code)->count() > 0){
                    $code = randomNumber(4);
                }
                // save the activation code
                $activationData = [
                    'activation_code'   => $code,
                    'account_type'      => get_class($user),
                    'account_id'        => $user->id,
                    'type'              => 'activation',
                ];
                $activation = UserActivation::create($activationData);
                if($activation){
                    // send the email
                    Notification::send($user, new RegisterNotification($user, $code));

                    $response = [
                        'user'      => $user,
                        'api_token' => $user->api_token
                    ];
                    return json_response($response, 201);
                }else{
                    return json_response([], 100);
                }
            }else{
                return json_response([], 100);
            }
        }catch (Exception $e){
            return json_response([], 100);
        }

    }

    /**
     * activate the account using activation code
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function activate_account(Request $request){
        if(get_class(Auth::user()) == 'App\User'){
            $user = User::find(Auth::id());
        }elseif(get_class(Auth::user()) == 'App\Company'){
            $user = Company::find(Auth::id());
        }

        if($user->status != 0){
            return json_response('this account has been already activated', 402);
        }else{
            $input = $request->all();
            $rules = [
                'code'  => 'required',
            ];
            $validation = Validator::make($input, $rules);
            if($validation->fails()){
                $errors = $validation->errors()->first();
                return json_response($errors, 402);
            }else{
                // check if code exists for this user
                $code = UserActivation::where('activation_code',$input['code'])
                    ->where('account_type',get_class($user))
                    ->where('account_id',$user->id)
                    ->where('type','activation')
                    ->first();
                if(!empty($code)){

                    // check if the code still valid ( it is valid for only one hour )
                    if($code->created_at->diffInMinutes(Carbon::now()) <= 60){
                        // activate the account
                        $user->status = 1;
                        $user->save();
                        $code->delete();
                        return json_response([],200);
                    }else{
                        // not valid code (expired) => delete it
                        $code->delete();
                        return json_response('this code has been expired',402);
                    }

                }else{
                    // wrong code
                    return json_response('this code is wrong',402);
                }
            }
        }

    }

    /**
     * resend the activation code
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resend_activation_code(Request $request){
        if(get_class(Auth::user()) == 'App\User'){
            $user = User::find(Auth::id());
        }elseif(get_class(Auth::user()) == 'App\Company'){
            $user = Company::find(Auth::id());
        }

        if($user->status != 0){
            return json_response('this account has been already activated', 402);
        }else{
            // check if code exists for this user
            $code = UserActivation::where('account_type',get_class($user))
                ->where('account_id',$user->id)
                ->where('type','activation')
                ->first();
            if(!empty($code)){
                // delete the old code
                $code->delete();
            }
            // generate the activation code
            $code = randomNumber(4);
            while (UserActivation::where('activation_code',$code)->count() > 0){
                $code = randomNumber(4);
            }
            // save the activation code
            $activationData = [
                'activation_code'   => $code,
                'account_type'      => get_class($user),
                'account_id'        => $user->id,
                'type'              => 'activation',
            ];
            $activation = UserActivation::create($activationData);
            if($activation){
                // send the email
                Notification::send($user, new RegisterNotification($user, $code));
                return json_response([], 200);
            }else{
                return json_response([], 100);
            }

        }
    }

    /**
     * @param Request $request
     * @param $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function forget_password(Request $request, $type){
        $input = $request->all();
        $rules = ['email'=>'required'];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            $errors = $validation->errors()->first();
            return json_response($errors, 402);
        }else{

            if($type == 'user')
                $user = User::where('email',$input['email'])->first();
            elseif($type == 'company')
                $user = Company::where('email',$input['email'])->first();
            else
                return json_response([], 400);

            if(empty($user)){
                return json_response('user not found', 404);
            }
            // check if code exists for this user
            $code = UserActivation::where('account_type',get_class($user))
                ->where('account_id',$user->id)
                ->where('type','password')
                ->first();
            if(!empty($code)){
                // delete the old code
                $code->delete();
            }
            // generate the activation code
            $code = randomNumber(4);
            while (UserActivation::where('activation_code',$code)->count() > 0){
                $code = randomNumber(4);
            }
            // save the activation code
            $activationData = [
                'activation_code'   => $code,
                'account_type'      => get_class($user),
                'account_id'        => $user->id,
                'type'              => 'password',
            ];
            $activation = UserActivation::create($activationData);
            if($activation){
                // send the email
                Notification::send($user, new ForgetPasswordNotification($user, $code));
                return json_response([], 200);
            }else{
                return json_response([], 100);
            }

        }
    }

    /**
     * @param Request $request
     * @param $type
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function reset_password(Request $request, $type, $code){
        $input = $request->all();
        if($type == 'user'){
            $userCode = UserActivation::where('type','password')->where('activation_code',$code)->where('account_type','App\User')->first();
            $user = new User;
        }elseif($type == 'company'){
            $userCode = UserActivation::where('type','password')->where('activation_code',$code)->where('account_type','App\Company')->first();
            $user = new Company;
        }else{
            return json_response([], 400);
        }

        // check if code exists
        if(!empty($userCode)){

            $user = $user->find($userCode->account_id);

            // check if the code still valid ( it is valid for only one hour )
            if($userCode->created_at->diffInMinutes(Carbon::now()) <= 60){

                // validation rules
                $rules = ['password'  => 'required|min:8'];
                $validation = Validator::make($input, $rules);
                if($validation->fails()){
                    $errors = $validation->errors()->first();
                    return json_response($errors, 402);
                }

                // update the password
                $password = bcrypt($input['password']);
                $user->update(['password'=>$password]);
                $userCode->delete();
                return json_response([],200);
            }else{
                // not valid code (expired) => delete it
                $userCode->delete();
                return json_response('this code has been expired',402);
            }
        }else{
            // wrong code
            return json_response('this code is wrong',402);
        }

    }

    /**
     * change the old password
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function change_password(Request $request){
        if(get_class(Auth::user()) == 'App\User'){
            $user = User::find(Auth::id());
        }elseif(get_class(Auth::user()) == 'App\Company'){
            $user = Company::find(Auth::id());
        }

        $input = $request->all();
        $rules = [
            'old_password'  => 'required',
            'new_password'  => 'required|min:8|max:190',
        ];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            $errors = $validation->errors()->first();
            return json_response($errors, 402);
        }

        // check if the old password is true
        if(!Hash::check($input['old_password'], Auth::user()->password)){
            $errors = 'old password is not correct';
            return json_response($errors, 402);
        }

        // change the password
        try{

            $user = User::find(Auth::id());
            $user->password = bcrypt($input['new_password']);
            if($user->save()){
                return json_response([], 200);
            }else{
                return json_response([], 100);    
            }

        }catch(Exception $e){
            return json_response([], 100);
        }



    }

}
