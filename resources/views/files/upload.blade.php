@extends('layouts.base.files')

@section('navsidebar')

    <ul class="nav nav-sidebar">
        <li>
            <a href="javascript:">
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
        <input type="file" name="file">
        <input type="submit">
    </form>

@endsection
