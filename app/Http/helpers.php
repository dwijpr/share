<?php

use Illuminate\Support\Facades\Session;

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
