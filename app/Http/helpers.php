<?php

use Illuminate\Support\Facades\Session;

use Carbon\Carbon;

use ShareApp\File as FileModel;
use ShareApp\User;
use ShareApp\Activity;

if(!function_exists('translate')){
    function translate(Activity $activity){

        switch ($activity->type) {
            case 'user_created':
                return "<a href='/profile/view/{$activity->user->id}'>"
                ."<img class='img-profile-picture' src='".ppSrc($activity->user)."'>"
                ."{$activity->user->name}</a>"
                ." has joined the app";
            case 'profile_picture_updated':
                return "<a href='/profile/view/{$activity->user->id}'>"
                ."<img class='img-profile-picture' src='".ppSrc($activity->user)."'>"
                ."{$activity->user->name}</a>"
                ." has updated ".callUser($activity->user)." profile picture";
            default:
                return "Unknown Activity ...";
        }
    }
}

if(!function_exists('callUser')){
    function callUser(User $user){
        if($user->gender){
            return "his";
        }
        return "her";
    }
}

if(!function_exists('humanRead')){
    function humanRead(Activity $activity){
        return $activity->updated_at->diffForHumans();
    }
}

if(!function_exists('fmsgs')){
    function fmsgs($message = false){
        $msgs = Session::get('fmsgs');
        if(!$msgs){
            $msgs = [];
        }
        if($message){
            if(!isset($message['id'])){
                array_push($msgs, $message);
            }else{
                $msgs[$message['id']] = $message;
            }
        }else{
            return $msgs;
        }
        Session::flash(
            'fmsgs', $msgs
        );
    }
}

if(!function_exists('fileInfo')){
    function fileInfo(FileModel $file){
        $path = storage_path('app') . '/' . $file->filename;
        $_file = File::get($path);
        $type = File::mimeType($path);
        return [
            'file' => $_file,
            'type' => $type,
            'path' => $path,
        ];
    }
}

if(!function_exists('ppSrc')){
    function ppSrc(User $user){
        $path = 'img/default-'.($user->gender?'male':'female').'.png';
        if($user->profile_picture_id){
            if(FileModel::find($user->profile_picture_id)){
                $path = url('file/'.$user->profile_picture_id);
            }
        }
        return $path;
    }
}
