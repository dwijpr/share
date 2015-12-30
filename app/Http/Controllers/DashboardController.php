<?php

namespace ShareApp\Http\Controllers;

use Illuminate\Http\Request;

use ShareApp\Http\Requests;
use ShareApp\Http\Controllers\Controller;

use Gate;

class DashboardController extends Controller
{
    public function __construct(){
        if(auth()->check()){
            $this->authorize('dashboard');
        }else{
            $this->middleware('auth');
        }
    }

    public function index(){
        return view('dashboard.index');
    }
}
