<?php

namespace ShareApp;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = [
        'parent_id', 'user_id', 'name',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function files(){
        return $this->hasMany(File::class);
    }

    public static function root($user){
        $query = Folder::where('user_id', $user->id)
                ->where('parent_id', 0);
        return $query->first();
    }

    public function folder(){
        return $this->belongsTo(Folder::class, 'parent_id');
    }

    public function folders(){
        return $this->hasMany(Folder::class, 'parent_id');
    }
}
