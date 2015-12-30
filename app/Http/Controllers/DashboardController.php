<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        return view('home');
    }
}
