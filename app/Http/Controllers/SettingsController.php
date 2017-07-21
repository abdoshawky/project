<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Section;
use App\Setting;
use App\Classification;
use App\Type;
use App\Governorate;
use App\City;

use Validator;
use Lang;

class SettingsController extends Controller
{
	public $return;

    public function main_settings(){

    	$this->return['page'] = [
            'title'     => Lang::get('dashboard.settings'),
            'header'    => Lang::get('dashboard.settings'),
            'active'	=> [
            	'main'	=> 'settings',
            	'sub'	=> 'main_settings'
            ],
            'breadcrumb'    => [
                                Lang::get('dashboard.dashboard') => url('/dashboard'),
                                Lang::get('dashboard.settings')  => 'active'
                                ]
        ];

    	$this->return['settings'] = Setting::pluck('option_value','option_name')->toArray();
    	return view('dashboard.settings.main', $this->return);
    }

    public function save_settings(Request $request){
        $inputs = $request->all();
        foreach ($inputs as $option_name => $option_value){
            $value = $option_value == null ? '' : $option_value;
            if($option_name != '_token'){
                if(Setting::where('option_name', $option_name)->count() == 0){
                    // create new option
                    Setting::create(['option_name'=>$option_name, 'option_value'=>$value]);
                }else{
                    // update existing option
                    Setting::where('option_name',$option_name)->update(['option_value'=>$value]);
                }
            }
        }

        return redirect()->back();
    }

    /**
     * classifications functions
     */

    public function companies_classifications(){

    	$this->return['page'] = [
            'title'     => Lang::get('dashboard.companies_classifications'),
            'header'    => Lang::get('dashboard.companies_classifications'),
            'active'	=> [
            	'main'	=> 'settings',
            	'sub'	=> 'classifications'
            ],
            'breadcrumb'    => [
                                Lang::get('dashboard.dashboard') => url('/dashboard'),
                                Lang::get('dashboard.companies_classifications')  => 'active'
                                ]
        ];
        $this->return['classifications'] = Classification::all();
    	return view('dashboard.settings.classifications', $this->return);
    }

    public function create_classification(Request $request){
    	$input = $request->all();
    	$rules = ['name'=>'required|unique:classifications,name'];
    	$validation = Validator::make($input, $rules);
    	if($validation->fails()){
    		return redirect()->back()->withInput()->withErrors($validation);
    	}else{
    		$add = Classification::create(['name'=>$input['name']]);
    		if($add){
    			return redirect()->back();
    		}else{
    			return redirect()->back()->withInput();
    		}
    	}
    }

    public function update_classification(Request $request, $id){
    	$input = $request->all();
    	$rules = ['name'=>'required|unique:classifications,name,'.$id];
    	$validation = Validator::make($input, $rules);
    	if($validation->fails()){
    		return redirect()->back()->withInput()->withErrors($validation);
    	}else{
    		$add = Classification::where('id',$id)->update(['name'=>$input['name']]);
    		if($add){
    			return redirect()->back();
    		}else{
    			return redirect()->back()->withInput();
    		}
    	}
    }

    public function delete_classification($id){
    	Classification::where('id',$id)->delete();
    	return redirect()->back();
    }

    /**
     * Section functions
     */

    public function ads_sections(){

        $this->return['page'] = [
            'title'     => Lang::get('dashboard.ads_sections'),
            'header'    => Lang::get('dashboard.ads_sections'),
            'active'	=> [
                'main'	=> 'settings',
                'sub'	=> 'sections'
            ],
            'breadcrumb'    => [
                Lang::get('dashboard.dashboard') => url('/dashboard'),
                Lang::get('dashboard.ads_sections')  => 'active'
            ]
        ];
        $this->return['sections'] = Section::all();
        return view('dashboard.settings.sections', $this->return);
    }

    public function create_section(Request $request){
        $input = $request->all();
        $rules = ['name'=>'required|unique:sections,name'];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);
        }else{
            $add = Section::create(['name'=>$input['name']]);
            if($add){
                return redirect()->back();
            }else{
                return redirect()->back()->withInput();
            }
        }
    }

    public function update_section(Request $request, $id){
        $input = $request->all();
        $rules = ['name'=>'required|unique:sections,name,'.$id];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);
        }else{
            $add = Section::where('id',$id)->update(['name'=>$input['name']]);
            if($add){
                return redirect()->back();
            }else{
                return redirect()->back()->withInput();
            }
        }
    }

    public function delete_section($id){
        Section::where('id',$id)->delete();
        return redirect()->back();
    }

    /*
     * ads type
     */

    public function ads_types(){

        $this->return['page'] = [
            'title'     => Lang::get('dashboard.ads_types'),
            'header'    => Lang::get('dashboard.ads_types'),
            'active'	=> [
                'main'	=> 'settings',
                'sub'	=> 'types'
            ],
            'breadcrumb'    => [
                Lang::get('dashboard.dashboard') => url('/dashboard'),
                Lang::get('dashboard.ads_types')  => 'active'
            ]
        ];
        $this->return['types'] = Type::all();
        return view('dashboard.settings.types', $this->return);
    }

    public function create_type(Request $request){
        $input = $request->all();
        $rules = ['name'=>'required|unique:types,name'];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);
        }else{
            $add = Type::create(['name'=>$input['name']]);
            if($add){
                return redirect()->back();
            }else{
                return redirect()->back()->withInput();
            }
        }
    }

    public function update_type(Request $request, $id){
        $input = $request->all();
        $rules = ['name'=>'required|unique:types,name,'.$id];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);
        }else{
            $add = Type::where('id',$id)->update(['name'=>$input['name']]);
            if($add){
                return redirect()->back();
            }else{
                return redirect()->back()->withInput();
            }
        }
    }

    public function delete_type($id){
        Type::where('id',$id)->delete();
        return redirect()->back();
    }

    /*
     * governorates
     */

    public function governorates(){

        $this->return['page'] = [
            'title'     => Lang::get('dashboard.governorates').' & '.Lang::get('dashboard.cities'),
            'header'    => Lang::get('dashboard.governorates').' & '.Lang::get('dashboard.cities'),
            'active'	=> [
                'main'	=> 'settings',
                'sub'	=> 'governorates'
            ],
            'breadcrumb'    => [
                Lang::get('dashboard.dashboard')                                            => url('/dashboard'),
                Lang::get('dashboard.governorates').' & '.Lang::get('dashboard.cities')    => 'active'
            ]
        ];
        $this->return['governorates'] = Governorate::with('cities')->get();
        return view('dashboard.settings.governorates', $this->return);
    }

    public function create_governorate(Request $request){
        $input = $request->all();
        $rules = ['name'=>'required|unique:governorates,name'];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);
        }else{
            $add = Governorate::create(['name'=>$input['name']]);
            if($add){
                return redirect()->back();
            }else{
                return redirect()->back()->withInput();
            }
        }
    }

    public function update_governorate(Request $request, $id){
        $input = $request->all();
        $rules = ['name'=>'required|unique:types,name,'.$id];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);
        }else{
            $add = Governorate::where('id',$id)->update(['name'=>$input['name']]);
            if($add){
                return redirect()->back();
            }else{
                return redirect()->back()->withInput();
            }
        }
    }

    public function delete_governorate($id){
        Governorate::where('id',$id)->delete();
        return redirect()->back();
    }

    /**
     * cities
     */

    public function create_city(Request $request, $governorate_id){
        $input = $request->all();
        $rules = ['name'=>'required|unique:cities,name'];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);
        }else{
            $add = City::create(['name'=>$input['name'],'governorate_id'=>$governorate_id]);
            if($add){
                return redirect()->back();
            }else{
                return redirect()->back()->withInput();
            }
        }
    }

    public function update_city(Request $request, $id){
        $input = $request->all();
        $rules = ['name'=>'required|unique:cities,name,'.$id];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);
        }else{
            $add = City::where('id',$id)->update(['name'=>$input['name']]);
            if($add){
                return redirect()->back();
            }else{
                return redirect()->back()->withInput();
            }
        }
    }

    public function delete_city($id){
        City::where('id',$id)->delete();
        return redirect()->back();
    }
}
