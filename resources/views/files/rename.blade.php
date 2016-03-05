@extends('layouts.base.files')


@section('navsidebar')

    <ul class="nav nav-sidebar">
        <li class="active">
            <a href="javascript:">
                Rename {{ ucfirst($type) }}
            </a>
        </li>
        <li>
            <a href="{{ url('/files/'.$folder->id) }}">
                Back
            </a>
        </li>
    </ul>

@endsection


@section('_content')

    @parent

    @include(
        'files.partials.form', [
            'action' => '/rename/'.$type.'/'.$item->id,
            'placeHolder' => ucfirst($type),
            'label' => 'Update',
        ]
    )
    
@endsection
