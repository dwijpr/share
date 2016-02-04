<?php

namespace ShareApp\Providers;

use Illuminate\Support\ServiceProvider;

use ShareApp\User;
use ShareApp\Folder;
use ShareApp\File;
use ShareApp\Activity;

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
            Activity::create([
                'type' => 'user_created',
                'user_id' => $user->id,
            ]);
        });

        Folder::deleting(function(Folder $folder){
            foreach($folder->folders as $_folder){
                $_folder->_delete();
            }
            foreach($folder->files as $file){
                $file->delete();
            }
        });

        File::deleting(function(File $file){
            $file = updateFile($file, fileInfo($file));
            $filenames = [];
            if($file->type == 'image'){
                $altImages = ['opt', 'xs'];
                foreach ($altImages as $suffix) {
                    $name = explode('.', $file->filename)[0];
                    $extension = explode('.', $file->filename)[1];
                    array_push($filenames, "{$name}.$suffix.{$extension}");
                }
            }
            Storage::delete($file->filename);
            if(!empty($filenames)){
                foreach ($filenames as $filename) {
                    Storage::delete($filename);
                }
            }
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
