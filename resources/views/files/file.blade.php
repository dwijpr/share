@extends('layouts.base.file')


@section('styles')

    @parent

    <style>
        .img-responsive.vertically{
            border: 1px solid rgba(0, 0, 0, .4);
            max-height: 256px;
            margin: 0 auto;
        }
        @media (min-width: 768px){
            .img-responsive.vertically{
                max-height: 384px;
            }
        }
    </style>

@endsection


@section('navsidebar')

    <ul class="nav nav-sidebar">
        <li>
            <a href="/files/{{ $file->folder->id }}">
                Back
            </a>
        </li>
        <li>
            <a href="#">
                Download
            </a>
        </li>
        <li>
            <a href="#">
                Set As Profile Picture
            </a>
        </li>
    </ul>

@endsection

@section('_content')

    @parent

    <p class="text-center">
        <a href="/files/{{ $file->folder->id }}" class="btn btn-default">
            <i class="fa fa-sign-out"></i>
            <span class="hidden-sm hidden-xs">Back</span>
        </a>
        <a href="/download/{{ $file->id }}" class="btn btn-primary">
            <i class="fa fa-download"></i>
            <span class="hidden-sm hidden-xs">Download</span>
        </a>
        <a href="javascript:" class="btn btn-info">
            <i class="fa fa-picture-o"></i>
            <span class="hidden-sm hidden-xs">Set As Profile Picture</span>
        </a>
    </p>

    <img 
        id="image-view" 
        class="img-responsive vertically" 
        src="{{ $file->src }}"
    >

@endsection
