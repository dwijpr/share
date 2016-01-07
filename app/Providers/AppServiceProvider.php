<?php

namespace ShareApp\Providers;

use Illuminate\Support\ServiceProvider;

use ShareApp\User;
use ShareApp\Folder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::created(function($user){
            Folder::create([
                'name' => '/',
                'user_id' => $user->id,
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
