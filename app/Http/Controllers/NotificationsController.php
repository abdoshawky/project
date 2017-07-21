<?php

namespace App\Http\Controllers;

use App\Company;
use App\Notification;
use App\User;
use Validator;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function send(Request $request){
        $input = $request->all();
        $rules = [
            'account_type'  => 'required',
            'account_id'    => 'required',
            'content'       => 'required'
        ];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);
        }

        if($input['account_type'] == 'user'){
            $model = new User;
        }elseif($input['account_type'] == 'company'){
            $model = new Company;
        }

        $data = [
            'type'          =>  'management',
            'send_to_id'    =>  $input['account_id'],
            'send_to_type'  =>  get_class($model),
            'content'       =>  $input['content'],
        ];

        Notification::create($data);
        return redirect()->back();

    }
}
