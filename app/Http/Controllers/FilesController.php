<?php

namespace ShareApp\Http\Controllers;

use Illuminate\Http\Request;

use ShareApp\Http\Requests;
use ShareApp\Http\Controllers\Controller;

use Storage;

use ShareApp\Folder;
use ShareApp\File;

class FilesController extends Controller
{
    private $user;

    public function __construct(){
        $this->middleware('auth');
        $this->user = auth()->user();
    }

    public function index($folder = false){
        if(!$folder){
            $folder = Folder::root($this->user);
        }
        return view('files', ['folder' => $folder]);
    }

    public function upload(Folder $folder){
        return view('files.upload', ['folder' => $folder]);
    }

    public function uploadPost(Request $request, Folder $folder){
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
        $filename = $file->getFilename() . '.' . $extension;
        $name = $file->getClientOriginalName();

        $storage = Storage::disk('local')->put(
            $filename
            , file_get_contents($file->getRealPath())
        );

        File::create([
            'name' => $name,
            'filename' => $filename,
            'folder_id' => $folder->id,
        ]);

        fmsgs([
            'title' => 'File Uploaded',
            'type' => 'success',
            'text' => 'The file uploaded successfully',
        ]);
        return redirect()->back();
    }
}
