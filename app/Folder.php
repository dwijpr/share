<?php

namespace ShareApp;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function files(){
        return $this->hasMany(File::class);
    }
}
