<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use League\Flysystem\Exception;
use Validator;
use Auth;

class CommentsController extends Controller
{
    public function create(Request $request){
        $ads = Ad::pluck('id')->toArray();
        $input = $request->all();
        $rules = [
            'comment'   => 'required|max:190',
            'ad_id'     => [
                'required',
                Rule::in($ads),
            ],
        ];

        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            $errors = $validation->errors()->first();
            return json_response($errors, 402);
        }else{
            $data['comment']    = $input['comment'];
            $data['user_id']    = Auth::id();
            $data['ad_id']      = $input['ad_id'];

            try{
                $add = Comment::create($data);
                if($add){
                    $comment = Comment::find($add->id);
                    return json_response($comment, 200);
                }else{
                    return json_response([],100);
                }
            }catch (Exception $e){
                return json_response([], 100);
            }
        }

    }
}
