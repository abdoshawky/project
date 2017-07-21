<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use League\Flysystem\Exception;
use Validator;

class ContactController extends Controller
{
    public function app_contacts(Request $request){
        $sections = Section::pluck('id')->toArray();
        $input = $request->all();
        $rules = [
            'name'          => 'required|max:190',
            'email'         => 'required|email',
            'title'         => 'required|max:190',
            'details'       => 'required',
            'section_id'    => [
                'required',
                Rule::in($sections),
            ]
        ];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            $errors = $validation->errors()->first();
            return json_response($errors, 402);
        }else{
            $data['name']       = $input['name'];
            $data['email']      = $input['email'];
            $data['title']      = $input['title'];
            $data['details']    = $input['details'];
            $data['section_id'] = $input['section_id'];
            $data['type']       = 'application';
            $optional = ['age','phone'];
            foreach ($optional as $option){
                if($request->has($option))
                    $data[$option] = $input[$option];
            }

            try{
                if(Contact::create($data)){
                    return json_response([], 200);
                }else{
                    return json_response([], 100);
                }
            }catch (Exception $e){
                return json_response([], 100);
            }
        }
    }
}
