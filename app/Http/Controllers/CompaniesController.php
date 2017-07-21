<?php

namespace App\Http\Controllers;

use App\Classification;
use App\Company;
use App\CompanyWorks;
use App\AccountSettings;
use Illuminate\Http\Request;
use League\Flysystem\Exception;
use Validator;
use Auth;

class CompaniesController extends Controller
{

    /*********************************************************/
    /***************    API Methods   ************************/
    /*********************************************************/

    public function search_companies(Request $request){
        $input = $request->all();
        $companies = Company::with('rates');


        if($request->has('company_name')){
            $companies = $companies->where('company_name','LIKE','%'.$input['company_name'].'%');
        }

        if($request->has('city_id')){
            $companies = $companies->where('city_id',$input['city_id']);
        }

        if($request->has('classification_id')){
            $companies = $companies->where('classification_id',$input['classification_id']);
        }

        if($request->has('rate')){
            $rate = intval($input['rate']);
            $companies = $companies->get();
            for($i = 0; $i < count($companies); $i++){
                $companies[$i]->average_rate = $companies[$i]->rates->avg('total_rate');
            }

            return json_response($companies->where('average_rate',$rate), 200);
        }


        $companies = $companies->get();
        $companies[0]->average_rate = $companies[0]->rates->avg('total_rate');
        return json_response($companies->where('average_rate','3'), 200);
    }


    public function classification_companies($classification_id){
        $classification = Classification::with(['companies','companies.city','companies.city.governorate'])->find($classification_id);
        if(empty($classification)){
            return json_response('classification not found',404);
        }
        $response['classification'] = $classification;
        return json_response($response, 200);
    }

    /**
     * update account settings (vibration - voice - ...)
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * get all company works
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function works(Request $request){
        $works = CompanyWorks::where('company_id',Auth::id())->get();
        return json_response($works, 200);
    }

    /**
     * add new work to company
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create_work(Request $request){
        $input = $request->all();
        $rules = [
            'media' => 'required|file',
        ];

        // check if it is a valid file
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            $errors = $validation->errors()->first();
            return json_response($errors, 402);
        }

        // check if this file type is allowed
        $allowedTypes = ['image','video'];
        $type = explode('/',$request->file('media')->getMimeType())[0];
        if(!in_array($type, $allowedTypes)){
            $errors = 'the uploaded file must be an image or video';
            return json_response($errors, 402);
        }

        // upload the file
        if($type == 'image'){
            $file = uploadImage($request->file('media'), 'uploaded/company_works/');
        }elseif($type == 'video'){
            $path = 'uploaded/company_works';
            $uploaded = $request->media->store($path, 'uploaded');
            $file = str_replace($path.'/', '', $uploaded);
        }

        $data = [
            'company_id'    => Auth::id(),
            'type'          => $type,
            'src'           => $file,
        ];

        try{
            if(CompanyWorks::create($data)){
                return json_response([], 201);
            }else{
                return json_response([], 100);
            }
        }catch (Exception $e){
            return json_response([], 100);
        }

    }

    /**
     * delete an existing company work
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete_work(Request $request, $id){
        $work = CompanyWorks::where('id',$id)->where('company_id',Auth::id())->first();
        if(empty($work)){
            return json_response([],404);
        }

        deleteImage('uploaded/company_works/'.$work->src);
        $work->delete();
        return json_response([], 200);
    }




    /*********************************************************/
    /***************    Dashboard Methods   ******************/
    /*********************************************************/


}
