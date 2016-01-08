<?php

namespace ShareApp\Http\Controllers;

use Illuminate\Http\Request;

use ShareApp\Http\Requests;
use ShareApp\Http\Controllers\Controller;

use Storage;

use ShareApp\Folder;

class FilesController extends Controller
{
    private $user;

    public function __construct(){
        $this->middleware('auth');
        $this->user = auth()->user();
    }

    public function index($filesUri = false){
        if(!$filesUri){
            $dir = Folder::root($this->user);
        }
        return view('files', ['dir' => $dir]);
    }

    public function upload(Request $request){
        $file = $request->file('file');
        if(!$file){
            fmsgs([
                'title' => 'No File Detected',
                'type' => 'error',
                'text' => 'Please provide the file you want to upload!',
            ]);
            return redirect()->back();
        }

        $extension = $file->getClientOriginalExtension();
        $storage = Storage::disk('local')->put(
            $file->getFilename() . '.' . $extension
            , file_get_contents($file->getRealPath())
        );

        fmsgs([
            'title' => 'File Uploaded',
            'type' => 'success',
            'text' => 'The file uploaded successfully',
        ]);
        return redirect()->back();
    }
}
