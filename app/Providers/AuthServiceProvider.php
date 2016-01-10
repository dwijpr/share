<?php

namespace ShareApp\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use ShareApp\Permission;
use Illuminate\Support\Facades\Schema;

use ShareApp\Folder;
use ShareApp\Policies\FolderPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Folder::class => FolderPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        if(Schema::hasTable('permissions') and Schema::hasTable('roles')){
            foreach (Permission::with('roles')->get() as $permission) {
                $gate->define($permission->name, function($user) use($permission){
                    return $user->hasRole($permission->roles);
                });
            }
        }
    }
}
