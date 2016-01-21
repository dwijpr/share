<?php

namespace ShareApp\Http\Controllers;

use Illuminate\Http\Request;

use ShareApp\Http\Requests;
use ShareApp\Http\Controllers\Controller;

use ShareApp\Activity;
use ShareApp\User;

class HomeController extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        return view('home', [
            'activities' => 
                Activity::orderBy('updated_at', 'desc')->get()
        ]);
    }

    public function profile(User $user){
        return view('public.profile', [
            'user' => $user
        ]);
    }
}
