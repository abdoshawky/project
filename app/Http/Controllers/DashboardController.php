<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
    	$page = [
                'title'     => 'Dashboard',
                'header'    => 'Dashboard',
                'active'	=> '',
                ];
    	return view('dashboard.index')->with('page',$page);
    }
}
