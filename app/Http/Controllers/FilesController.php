<?php

namespace ShareApp\Http\Controllers;

use Illuminate\Http\Request;

use ShareApp\Http\Requests;
use ShareApp\Http\Controllers\Controller;

use Storage;
use File;
use Response;

use ShareApp\Folder;
use ShareApp\File as FileModel;
use ShareApp\Activity;

class FilesController extends Controller
{
    private $user;

    public function __construct(){
        parent::__construct();
        $this->middleware('auth', [
            'except' => [
                'file', 'fileView', 'download',
            ]
        ]);
        $this->user = auth()->user();
    }

    public function index($folder = false){
        if(!$folder){
            $folder = Folder::root($this->user);
        }else{
            $folder = Folder::findOrFail($folder);
        }

        $this->authorize('all', $folder);

        return view('files', ['folder' => $folder]);
    }

    public function newFolder(Folder $folder){
        $this->authorize('all', $folder);
        return view('files.new-folder', ['folder' => $folder]);
    }

    private function folderValidationRules(){
        return [
            'name' => 'required',
        ];
    }

    public function createFolder(Request $request, Folder $folder){
        $this->authorize('all', $folder);
        $this->validate($request, $this->folderValidationRules());

        Folder::create([
            'parent_id' => $folder->id,
            'user_id' => $folder->user->id,
            'name' => $request->name,
        ]);

        fmsgs([
            'title' => 'New Folder',
            'type' => 'success',
            'text' => 'The folder created successfully',
        ]);
        return redirect('/files/'.$folder->id);
    }

    public function folderDelete(Folder $folder){
        $this->authorize('all', $folder);
        $folder->delete();
        fmsgs([
            'title' => 'Folder Deleted',
            'type' => 'success',
            'text' => 'The '.$folder->name.' folder successfully deleted!',
        ]);
        return redirect('/files/'.$folder->parent_id);
    }

    public function upload(Folder $folder){
        $this->authorize('all', $folder);
        return view('files.upload', ['folder' => $folder]);
    }

    public function uploadPost(Request $request, Folder $folder){
        $this->authorize('all', $folder);
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

        FileModel::create([
            'name' => $name,
            'filename' => $filename,
            'folder_id' => $folder->id,
        ]);

        fmsgs([
            'title' => 'File Uploaded',
            'type' => 'success',
            'text' => 'The file uploaded successfully',
        ]);
        return redirect('/files/'.$folder->id);
    }

    public function fileView(FileModel $file){
        if(!$file->shared){
            $this->authorize('all', $file);
        }
        $_file = fileInfo($file);
        $file = updateFile($file, $_file);
        return view('files.file', ['file' => $file]);
    }

    public function file(FileModel $file){
        if(!$file->shared){
            $this->authorize('all', $file);
        }
        $_file = fileInfo($file);
        $response = Response::make($_file['file'], 200);
        $response->header("Content-Type", $_file['type']);
        return $response;
    }

    public function setAsProfilePicture(FileModel $file){
        $this->authorize('all', $file);
        $this->user->profile_picture_id = $file->id;
        $this->user->save();
        $this->_share($file, 1, false);
        Activity::create([
            'type' => 'profile_picture_updated',
            'item_id' => $file->id,
            'user_id' => $this->user->id,
        ]);
        fmsgs([
            'title' => 'Profile Picture Updated',
            'type' => 'success',
            'text' => 'The '.$file->name.' set as Your Profile Picture',
        ]);
        return redirect()->back();
    }

    private function _share(FileModel $file, $value, $createActivity = true){
        $this->authorize('all', $file);
        $file->shared = $value;
        $file->save();
        if($value){
            if($createActivity){
                Activity::create([
                    'type' => 'file_shared',
                    'item_id' => $file->id,
                    'user_id' => $this->user->id,
                ]);
            }
            fmsgs([
                'title' => 'File Shared',
                'type' => 'success',
                'text' => 'The '.$file->name.' file successfully shared!',
            ]);
        }else{
            fmsgs([
                'title' => 'Unshared File',
                'type' => 'success',
                'text' => 'The '.$file->name.' file successfully unshared!',
            ]);
        }
        return redirect()->back();
    }

    public function share(FileModel $file){
        return $this->_share($file, 1);
    }

    public function unshare(FileModel $file){
        return $this->_share($file, 0);
    }

    public function download(FileModel $file){
        if(!$file->shared){
            $this->authorize('all', $file);
        }
        $_file = fileInfo($file);
        return Response::download($_file['path'], $file->name);
    }

    public function fileDelete(FileModel $file){
        $this->authorize('all', $file);
        $file->delete();
        fmsgs([
            'title' => 'File Deleted',
            'type' => 'success',
            'text' => 'The '.$file->name.' file successfully deleted!',
        ]);
        return redirect('/files/'.$file->folder->id);
    }
}
