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
    </ul>

@endsection

@section('_content')

    @parent

    <p class="text-center">
        <button class="btn btn-default">
            <i class="fa fa-sign-out"></i>
            <span class="hidden-sm hidden-xs">Back</span>
        </button>
        <button class="btn btn-primary">
            <i class="fa fa-download"></i>
            <span class="hidden-sm hidden-xs">Download</span>
        </button>
        <button class="btn btn-info">
            <i class="fa fa-picture-o"></i>
            <span class="hidden-sm hidden-xs">Set As Profile Picture</span>
        </button>
    </p>

    <img 
        id="image-view" 
        class="img-responsive vertically" 
        src="{{ $file->src }}"
    >

@endsection
