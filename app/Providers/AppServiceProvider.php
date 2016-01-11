<?php

namespace ShareApp\Providers;

use Illuminate\Support\ServiceProvider;

use ShareApp\User;
use ShareApp\Folder;
use ShareApp\File;

use Storage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::created(function(User $user){
            Folder::create([
                'name' => '/',
                'user_id' => $user->id,
            ]);
        });

        Folder::deleting(function(Folder $folder){
            $folder->folders()->delete();
            $folder->files()->delete();
        });

        File::deleting(function(File $file){
            Storage::delete($file->filename);
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
