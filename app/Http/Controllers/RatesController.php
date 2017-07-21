<?php

namespace App\Http\Controllers;

use App\Company;
use App\Rate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use League\Flysystem\Exception;
use Validator;
use Auth;

class RatesController extends Controller
{
    public function create(Request $request){
        $companies = Company::where('status',1)->pluck('id')->toArray();
        $input = $request->all();
        $rules = [
            'company_id'    => [
                'required',
                Rule::in($companies),
            ],
            'commitment'    => 'required|numeric|min:0|max:1',
            'prices'        => 'required|numeric|min:0|max:1',
            'quality'       => 'required|numeric|min:0|max:1',
            'accuracy'      => 'required|numeric|min:0|max:1',
            'honesty'       => 'required|numeric|min:0|max:1',
            'comment'       => 'required|max:190'
        ];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            $errors = $validation->errors()->first();
            return json_response($errors, 402);
        }else{
            $data = [
                'user_id'       => Auth::id(),
                'company_id'    => $input['company_id'],
                'commitment'    => $input['commitment'],
                'prices'        => $input['prices'],
                'quality'       => $input['quality'],
                'accuracy'      => $input['accuracy'],
                'honesty'       => $input['honesty'],
                'comment'       => $input['comment']
            ];

            try{
                $old_rate = Rate::where('user_id',Auth::id())->where('company_id',$input['company_id'])->first();
                if(empty($old_rate)){
                    // add a new recode
                    if(Rate::create($data)){
                        return json_response([], 200);
                    }else{
                        return json_response([], 100);
                    }
                }else{
                    // update the old record
                    if(Rate::find($old_rate->id)->update($data)){
                        return json_response([], 200);
                    }else{
                        return json_response([], 100);
                    }
                }

            }catch (Exception $e){
                return json_response([], 100);
            }
        }
    }
}
