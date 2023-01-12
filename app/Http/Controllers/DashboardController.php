<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('dash.index');
    }

    public function setting(){
        
        return view('profile.show');
    }
}
