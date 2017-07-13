<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classification;

use Validator;

class SettingsController extends Controller
{
	public $return;

    public function main_settings(){

    	$this->return['page'] = [
            'title'     => 'Settings',
            'header'    => 'Settings',
            'active'	=> [
            	'main'	=> 'settings',
            	'sub'	=> 'main_settings'
            ],
            'breadcrumb'    => [
                                'dashboard' => url('/dashboard'),
                                'settings'  => 'active'
                                ]
        ];
    	return view('dashboard.settings.main', $this->return);
    }

    public function companies_classifications(){

    	$this->return['page'] = [
            'title'     => 'Companies Classifications',
            'header'    => 'Companies Classifications',
            'active'	=> [
            	'main'	=> 'settings',
            	'sub'	=> 'classifications'
            ],
            'breadcrumb'    => [
                                'dashboard' => url('/dashboard'),
                                'settings'  => 'active'
                                ]
        ];
        $this->return['classifications'] = Classification::all();
    	return view('dashboard.settings.classifications', $this->return);
    }

    public function create_classification(Request $request){
    	$input = $request->all();
    	$rules = ['name'=>'required|unique:classification,name'];
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
    	$rules = ['name'=>'required|unique:classification,name,'.$id];
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
}
