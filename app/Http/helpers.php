<?php

use Illuminate\Support\Facades\Session;

use Carbon\Carbon;

use ShareApp\File as FileModel;
use ShareApp\User;
use ShareApp\Activity;

if(!function_exists('showName')){
    function showName(Activity $activity){
        $name = false;
        if($activity->item_id){
            $file = FileModel::findOrFail($activity->item_id);
            $name = $file->name;
        }
        return $name;
    }
}

if(!function_exists('show')){
    function show(Activity $activity){
        $file = false;
        $_file = false;
        if($activity->item_id){
            $file = FileModel::findOrFail($activity->item_id);
            $_file = fileInfo($file);
            $file = updateFile($file, $_file);
        }
        if($file){
            switch ($file->type) {
                case 'audio':
                    return "<audio preload='none' class=\"file-view\" controls>"
                    ."<source src=\"$file->src\">"
                    ."Your browser does not support the audio element."
                    ."</audio>";
                case 'video':
                    return "<video preload='none' class=\"file-view\" controls>"
                    ."<source src=\"$file->src\">"
                    ."Your browser does not support the video tag."
                    ."</video>";
                case 'image':
                    return "<img id=\"image-view\" class=\"file-view\" "
                    ."src=\"$file->src\""
                    .">";
                default:
                    return 'Unknown file type...';
            }
        }
    }
}

if(!function_exists('translate')){
    function translate(Activity $activity){
        switch ($activity->type) {
            case 'file_shared':
                return "<a href='/profile/view/{$activity->user->id}'>"
                ."<img class='img-profile-picture' src='".ppSrc($activity->user)."'>"
                ."{$activity->user->name}</a>"
                ." has shared ".callUser($activity->user)
                ." <a href='/file/view/".$activity->item_id."'>file</a>";
            case 'user_created':
                return "<a href='/profile/view/{$activity->user->id}'>"
                ."<img class='img-profile-picture' src='".ppSrc($activity->user)."'>"
                ."{$activity->user->name}</a>"
                ." has joined the app";
            case 'profile_picture_updated':
                return "<a href='/profile/view/{$activity->user->id}'>"
                ."<img class='img-profile-picture' src='".ppSrc($activity->user)."'>"
                ."{$activity->user->name}</a>"
                ." has updated ".callUser($activity->user)
                ." <a href='/file/view/".$activity->item_id."'>profile picture</a>";
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

if(!function_exists('updateFile')){
    function updateFile(FileModel $file, array $_file){
        $types = explode('/', $_file['type']);
        $file->type = $types[0];
        $file->typeDetail = $types[1];
        $file->src = url('file/'.$file->id);
        return $file;
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
