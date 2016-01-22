@extends('layouts.base.file')


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
        @can('all', $file)
            @if($file->id !== $file->folder->user->profile_picture_id)
                <li>
                    <a 
                        href="/{{ 
                            ($file->shared?'unshare':'share')
                            .'/'.$file->id 
                        }}" 
                    >
                        {{ $file->shared?'Unshare':'Share' }}
                    </a>
                </li>
                @if($file->type === 'image')
                    <li>
                        <a href="/change_profile_picture/{{ $file->id }}">
                            Set As Profile Picture
                        </a>
                    </li>
                @endif
            @endif
        @endcan
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
        @can('all', $file)
            @if($file->id !== $file->folder->user->profile_picture_id)
                <a 
                    href="/{{ 
                        ($file->shared?'unshare':'share')
                        .'/'.$file->id 
                    }}" 
                    class="btn btn-{{
                    $file->shared?'warning':'primary'
                    }} share"
                >
                    <i class="fa fa-{{ 
                        $file->shared?'ban':'share'
                    }}"></i>
                    {{ $file->shared?'Unshare':'Share' }}
                </a>
                @if($file->type === 'image')
                    <a href="/change_profile_picture/{{ $file->id }}" class="btn btn-info">
                        <i class="fa fa-picture-o"></i>
                        <span class="hidden-sm hidden-xs">Set As Profile Picture</span>
                    </a>
                @endif
            @endif
        @endcan
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
