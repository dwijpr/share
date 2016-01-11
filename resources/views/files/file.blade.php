@extends('layouts.base.file')

@section('navsidebar')

    <ul class="nav nav-sidebar">
    </ul>

@endsection

@section('_content')

    @parent

    <img class="img-responsive" src="{{ $file->src }}">

@endsection
