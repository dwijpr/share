<?php

namespace ShareApp;

use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    protected $fillable = [
        'value', 'label'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
