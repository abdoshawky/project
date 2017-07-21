<?php
/**
 * Created by PhpStorm.
 * User: abdos
 * Date: 15-07-2017
 * Time: 8:52 AM
 */

function json_response($data, $code = 200){
    $status = [
        100 => 'something wrong',
        111 => 'invalid api token',
        103 => 'auth failed',
        115 => 'token not found',

        200 => 'success',
        201 => 'created',

        400 => 'bad request',
        402 => 'validation error',
        401 => 'unauthorized',
        404 => 'not found',
        410 => 'wait before send',

    ];

    $response = [
        'code'  => $code,
        'message'   => $status[$code],
    ];
    if(!empty($data)){
        $response['data'] = $data;
    }

    return response()->json($response);
}

function uploadImage($img,$path){
    $fullName = str_random(12).date('Y-m-d').'.jpeg';

    $path = public_path($path);
    $img = Image::make($img)->save($path.$fullName);

    return $fullName;
}

function deleteImage($file){
    return File::delete($file);
}

function randomNumber($length) {
    $result = '';

    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}