@extends('layouts.base.file')


@section('navsidebar')

    @include('partials.file_side_menu')

@endsection

@section('_content')

    @parent

    @include('partials.menu_file_embed')

    @if($file->type === 'video')
        <video class="file-view thin-border" controls>
            <source src="{{ $file->src }}">
            Your browser does not support the video tag.
        </video>
    @elseif($file->type === 'image')
        <img 
            id="image-view" 
            class="file-view thin-border" 
            src="{{ $file->src.'/opt' }}"
        >
    @elseif($file->type === 'audio')
        <audio class="file-view thin-border" controls>
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
