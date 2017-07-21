<?php

namespace App\Http\Controllers;

use App\AccountSettings;
use Validator;
use Illuminate\Http\Request;
use Lang;
use Auth;
use App\User;

class UsersController extends Controller
{

    /*********************************************************/
    /***************    API Methods   ******************/
    /*********************************************************/

    public function update_settings(Request $request){
        $input = $request->all();
        $rules = [
            'notifications' => 'required|numeric|min:0|max:1',
            'voice'         => 'required|numeric|min:0|max:1',
            'vibration'     => 'required|numeric|min:0|max:1',
        ];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            $errors = $validation->errors()->first();
            return json_response($errors, 402);
        }

        $settings = AccountSettings::where('account_id',Auth::id())->where('account_type',get_class(Auth::user()))->first();
        if(empty($settings)){
            AccountSettings::create([
                'account_id'    => Auth::id(),
                'account_type'  => get_class(Auth::user()),
                'notifications' => $input['notifications'],
                'voice'         => $input['voice'],
                'vibration'     => $input['vibration'],
            ]);
        }else{
            $settings->notifications    = $input['notifications'];
            $settings->voice            = $input['voice'];
            $settings->vibration        = $input['vibration'];
            $settings->save();
        }

        return json_response([], 200);
    }



    /*********************************************************/
    /***************    Dashboard Methods   ******************/
    /*********************************************************/

    public $return;

    public function index(){

        $this->return['page'] = [
            'title'     => Lang::get('dashboard.users'),
            'header'    => Lang::get('dashboard.users'),
            'active'	=> [
                'main'	=> 'members',
                'sub'	=> 'users'
            ],
            'breadcrumb'    => [
                Lang::get('dashboard.dashboard') => url('/dashboard'),
                Lang::get('dashboard.users')  => 'active'
            ]
        ];
        $this->return['users'] = User::all();

        return view('dashboard.users.index', $this->return);
    }

    public function activate(Request $request, $id){
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        return redirect()->back();
    }

    public function show($id){
        $user = User::with(['city','city.governorate'])->find($id);
        $this->return['page'] = [

            'title'     => Lang::get('dashboard.users').': '.$user->name,
            'header'    => Lang::get('dashboard.users').': '.$user->name,
            'active'	=> [
                'main'	=> 'members',
                'sub'	=> 'users'
            ],
            'breadcrumb'    => [
                Lang::get('dashboard.dashboard')                => url('/dashboard'),
                Lang::get('dashboard.users')                    => url('/dashboard/users'),
                Lang::get('dashboard.users').': '.$user->name    => 'active'
            ]
        ];
        $this->return['user'] = $user;

        return view('dashboard.users.show', $this->return);
    }

    public function delete(Request $request, $id){
        $user = User::find($id);
        deleteImage(url('images/uploaded/users/'.$user->image));
        return redirect()->back();
    }
}
