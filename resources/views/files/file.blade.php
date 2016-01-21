@extends('layouts.base.file')


@section('styles')

    @parent

    <style>
        .file-view{
            display: block;
            max-width: 100%;
            max-height: 256px;
            margin: 0 auto;
            border: 1px solid rgba(0, 0, 0, .4);
            border-radius: 5px;
        }
        @media (min-width: 768px){
            .file-view{
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
            <a href="/download/{{ $file->id }}">
                Download
            </a>
        </li>
        @if($file->type === 'image')
            <li>
                <a href="/change_profile_picture/{{ $file->id }}">
                    Set As Profile Picture
                </a>
            </li>
        @endif
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
        @if($file->type === 'image')
            <a href="/change_profile_picture/{{ $file->id }}" class="btn btn-info">
                <i class="fa fa-picture-o"></i>
                <span class="hidden-sm hidden-xs">Set As Profile Picture</span>
            </a>
        @endif
    </p>

    @if($file->type === 'video')
        <video class="file-view" controls>
            <source src="{{ $file->src }}">
            Your browser does not support the video tag.
        </video>
    @elseif($file->type === 'image')
        <img 
            id="image-view" 
            class="file-view" 
            src="{{ $file->src }}"
        >
    @elseif($file->type === 'audio')
        <audio class="file-view" controls>
            <source src="{{ $file->src }}">
            Your browser does not support the audio element.
        </audio>
    @else
        <h1 class="text-danger text-center">
            No Preview Available for 
            <i class="text-info">{{ $file->typeDetail }}</i>
            &nbsp;
            files.
        </h1>
    @endif

@endsection
