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

    public function uri($linkSelf = false){
        $folder = $this;
        $folders = [$folder];
        while($folder->parent_id){
            $folder = Folder::find($folder->parent_id);
            array_push($folders, $folder);
        }

        $folders = array_reverse($folders);
        $view = "";
        $tpl = "<li><a href='%s'>%s</a></li>";
        $tplActive = "<li class='active'>%s</li>";
        foreach ($folders as $index => $folder) {
            if($folder->name === "/"){
                $folder->name = 'Files';
            }
            if(count($folders) === $index+1 && !$linkSelf){
                $view .= sprintf($tplActive, $folder->name);
            }else{
                $view .= sprintf($tpl, "/files/".$folder->id, $folder->name);
            }
        }
        return $view;
    }

    public function _delete(){
        if(count($this->folders)){
            foreach($this->folders as $folder){
                $folder->_delete();
            }
        }
        foreach($this->files as $file){
            $file->delete();
        }
        $this->delete();
    }
}
