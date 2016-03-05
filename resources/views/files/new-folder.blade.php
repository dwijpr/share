@extends('layouts.base.files')


@section('navsidebar')

    <ul class="nav nav-sidebar">
        <li class="active">
            <a href="javascript:">
                Create New Folder
            </a>
        </li>
        <li>
            <a href="{{ url('/files/upload/'.$folder->id) }}">
                Upload File
            </a>
        </li>
    </ul>

@endsection


@section('_content')

    @parent

    @include('files.partials.form')
    
@endsection
