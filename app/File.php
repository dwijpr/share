<?php

namespace ShareApp;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'folder_id', 'filename', 'name',
    ];

    public function folder(){
        return $this->belongsTo(Folder::class);
    }
}
