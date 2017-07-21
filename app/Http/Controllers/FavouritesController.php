<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Company;
use App\Favourite;
use App\User;
use League\Flysystem\Exception;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;

class FavouritesController extends Controller
{

    public function favourites($type = null){
        $favourites = Favourite::with('favourite')
            ->where('account_type',get_class(Auth::user()))
            ->where('account_id',Auth::id())
            ->get()
            ->groupBy('relations.favourite.table')->all();
        $response = [
            'companies' => [],
            'users'     => [],
            'ads'       => [],
        ];
        foreach ($favourites as $type =>  $type_favourite){
            foreach ($type_favourite as $favourite){
                $favourite->favourite->resource_id = $favourite->id;
                $response[$type][] = $favourite->favourite;
            }
        }
        return json_response($response, 200);
    }

    /**
     * add ( ad - company - user ) to your favourite list
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add_favourite(Request $request){
        $types = ['user','company','ad'];
        $input = $request->all();
        $model = new Ad;
        $notIn = [];
        $ids = [];
        if($request->has('type')){
            if($input['type'] == 'user'){
                $model = new User;
                if(get_class(Auth::user()) == 'App\User'){
                    $notIn = [Auth::id()];
                }
            }elseif ($input['type'] == 'company'){
                $model = new Company;
                if(get_class(Auth::user()) == 'App\Company'){
                    $notIn = [Auth::id()];
                }
            }
            $ids = $model->pluck('id')->toArray();
        }

        $rules = [
            'type'  => [
                'required',
                Rule::in($types),
            ],
            'favourite_id'  => [
                'required',
                Rule::in($ids),
                Rule::notIn($notIn),
            ],
        ];

        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            $errors = $validation->errors()->first();
            return json_response($errors, 402);
        }

        if(Favourite::where('account_id',Auth::id())
                ->where('account_type',get_class(Auth::user()))
                ->where('favourite_id',$input['favourite_id'])
                ->where('favourite_type',get_class($model))
                ->count() > 0){
            $errors = 'you have already added this to your favourites';
            return json_response($errors, 402);
        }

        $data = [
            'account_id'        => Auth::id(),
            'account_type'      => get_class(Auth::user()),
            'favourite_id'      => $input['favourite_id'],
            'favourite_type'    => get_class($model),
        ];

        try{
            if(Favourite::create($data)){
                return json_response([], 200);
            }else{
                return json_response([], 100);
            }
        }catch (Exception $e){
            return json_response([], 100);
        }

    }

    public function remove_favourite(Request $request, $id){
        $favourite = Favourite::find($id);
        if(empty($favourite)){
            return json_response([], 404);
        }

        $favourite->delete();
        return json_response([], 200);
    }
}
