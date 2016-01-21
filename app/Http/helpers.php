<?php

use Illuminate\Support\Facades\Session;

use ShareApp\File as FileModel;
use ShareApp\User;
use ShareApp\Activity;

if(!function_exists('translate')){
    function translate(Activity $activity){
        return "<a href='/profile/view/{$activity->user->id}'>{$activity->user->name}</a>"
        ." has joined the app";
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
