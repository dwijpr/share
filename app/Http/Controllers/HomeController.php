<?php

namespace ShareApp\Http\Controllers;

use Illuminate\Http\Request;

use ShareApp\Http\Requests;
use ShareApp\Http\Controllers\Controller;

use ShareApp\Activity;
use ShareApp\User;
use ShareApp\File as FileModel;

use DB;

class HomeController extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $activities = Activity::orderBy('updated_at', 'desc')->get();
        $activities = $activities->unique(function ($item) {
            return $item->user_id.$item->type.$item->item_id;
        });
        foreach($activities as $index => $activity) {
            if($activity->item_id){
                $file = FileModel::find($activity->item_id);
                if(!$file || !$file->shared){
                    unset($activities[$index]);
                }
            }
        }
        return view('home', [
            'activities' => $activities,
        ]);
    }

    public function profile(User $user){
        return view('public.profile', [
            'user' => $user
        ]);
    }
}
