@extends('layouts.base.files')

@section('navsidebar')

    <ul class="nav nav-sidebar">
        <li>
            <a href="/files/folder/new/{{ $folder->id }}">
                Create New Folder
            </a>
        </li>
        <li class="active">
            <a href="javascript:">
                Upload File
            </a>
        </li>
    </ul>

@endsection

@section('_content')

    @parent

    <form method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <input class="form-control" type="file" name="file">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit">
        </div>
    </form>

@endsection
