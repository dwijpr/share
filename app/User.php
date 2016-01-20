<?php

namespace ShareApp;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role){
        if(is_string($role)){
            return $this->roles->contains('name', $role);
        }
        return !! $role->intersect($this->roles)->count();
    }

    public function assign($role){
        return $this->roles()->save(
            is_string($role)?
            Role::whereName($role)->firstOrFail()
            :$role
        );
    }

    public function isAdmin(){
        return $this->hasRole('admin');
    }

    public function numbers(){
        return $this->hasMany(Number::class);
    }

    public function folders(){
        return $this->hasMany(Folder::class);
    }
}
