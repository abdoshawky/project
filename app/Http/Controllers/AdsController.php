<?php

namespace App\Http\Controllers;

use App\City;
use App\Section;
use App\Ad;
use App\Type;
use Illuminate\Http\Request;
use League\Flysystem\Exception;
use Illuminate\Validation\Rule;
use Auth;
use Validator;

class AdsController extends Controller
{

    public function search_ads(Request $request){
        $input = $request->all();
        $ads = new Ad;

        if($request->has('text')){
            $ads = $ads->where('title','LIKE','%'.$input['text'].'%')->orWhere('details','LIKE','%'.$input['text'].'%');
        }

        if($request->has('type_id')){
            $ads = $ads->where('type_id',$input['type_id']);
        }

        if($request->has('section_id')){
            $ads = $ads->where('section_id',$input['section_id']);
        }

        if($request->has('city_id')){
            $ads = $ads->where('city_id',$input['city_id']);
        }

        if($request->has('min_price')){
            $ads = $ads->where('price','>=',$input['min_price']);
        }

        if($request->has('max_price')){
            $ads = $ads->where('price','<=',$input['min_price']);
        }

        $ads = $ads->get();
        return json_response($ads, 200);
    }

    public function section_ads($section_id){
        $section = Section::with(['ads','ads.city','ads.city.governorate'])->find($section_id);
        if(empty($section)){
            return json_response('section not found',404);
        }
        $response['section'] = $section;
        return json_response($response, 200);
    }

    public function test(){
        dd(get_class(Auth::user()));
    }

    public function my_ads(){
        $account_id = Auth::id();
        $account_type = get_class(Auth::user());
        $ads = Ad::where('account_type',$account_type)->where('account_id',$account_id)->with(['section','city'])->get();
        return json_response($ads, 200);
    }

    public function create(Request $request){
        $sections   = Section::pluck('id')->toArray();
        $types      = Type::pluck('id')->toArray();
        $cities     = City::pluck('id')->toArray();

        $input = $request->all();
        $rules = [
            'section_id'    => [
                'required',
                Rule::in($sections),
            ],
            'type_id'       => [
                'required',
                Rule::in($types),
            ],
            'city_id'       => [
                'required',
                Rule::in($cities),
            ],
            'longitude' => 'required',
            'latitude'  => 'required',
            'area'      => 'required',
            'price'     => 'required',
            'title'     => 'required|max:190',
            'details'   => 'required',

        ];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            $errors = $validation->errors()->first();
            return json_response($errors, 402);
        }else{
            $data['section_id'] = $input['section_id'];
            $data['type_id']    = $input['type_id'];
            $data['city_id']    = $input['city_id'];
            $data['longitude']  = $input['longitude'];
            $data['latitude']   = $input['latitude'];
            $data['area']       = $input['area'];
            $data['price']      = $input['price'];
            $data['title']      = $input['title'];
            $data['details']    = $input['details'];
            $optional = ['m_price','address','phone'];
            foreach ($optional as $option){
                if($request->has($option))
                    $data[$option] = $input[$option];
            }

            $data['account_type']   = get_class(Auth::user());
            $data['account_id']     = Auth::id();

            try{
                $ad = Ad::create($data);
                if($ad){
                    $response = Ad::find($ad->id);
                    return json_response($response, 201);
                }else{
                    return json_response([], 100);
                }
            }catch (Exception $e){
                return json_response([], 100);
            }
        }
    }

    public function show($id){
        $account_id = Auth::id();
        $account_type = get_class(Auth::user());
        $ad = Ad::where('id',$id)
                ->where('account_type',$account_type)
                ->where('account_id',$account_id)
                ->with(['section','city','city.governorate','comments','comments.user'])
                ->first();

        if(empty($ad)){
            return json_response([], 404);
        }else{
            return json_response($ad, 200);
        }
    }

    public function update(Request $request, $id){
        $ad = Ad::where('id',$id)->where('account_type',get_class(Auth::user()))->where('account_id',Auth::id())->first();
        if(empty($ad)){
            return json_response([],404);
        }else{
            $sections = Section::pluck('id')->toArray();
            $types = ['rent','sell','service'];
            $cities = City::pluck('id')->toArray();

            $input = $request->all();
            $rules = [
                'section_id'    => [
                    'required',
                    Rule::in($sections),
                ],
                'type'          => [
                    'required',
                    Rule::in($types),
                ],
                'city_id'       => [
                    'required',
                    Rule::in($cities),
                ],
                'longitude' => 'required',
                'latitude'  => 'required',
                'area'      => 'required',
                'price'     => 'required',
                'title'     => 'required|max:190',
                'details'   => 'required',

            ];
            $validation = Validator::make($input, $rules);
            if($validation->fails()){
                $errors = $validation->errors()->first();
                return json_response($errors, 402);
            }else{
                $data['section_id'] = $input['section_id'];
                $data['type']       = $input['type'];
                $data['city_id']    = $input['city_id'];
                $data['longitude']  = $input['longitude'];
                $data['latitude']   = $input['latitude'];
                $data['area']       = $input['area'];
                $data['price']      = $input['price'];
                $data['title']      = $input['title'];
                $data['details']    = $input['details'];
                $optional = ['m_price','address','phone'];
                foreach ($optional as $option){
                    if($request->has($option))
                        $data[$option] = $input[$option];
                }

                $data['account_type']   = get_class(Auth::user());
                $data['account_id']     = Auth::id();

                try{
                    $ad = Ad::where('id',$id)->update($data);
                    if($ad){
                        $response = Ad::find($id);
                        return json_response($response, 200);
                    }else{
                        return json_response([], 100);
                    }
                }catch (Exception $e){
                    return json_response([], 100);
                }
            }
        }
    }

    public function delete(Request $request, $id){
        $ad = Ad::where('id',$id)->where('account_type',get_class(Auth::user()))->where('account_id',Auth::id())->first();
        if(empty($ad)){
            return json_response([],404);
        }else{
            if($ad->delete()){
                return json_response([], 200);
            }else{
                return json_response([], 100);
            }
        }
    }
}
