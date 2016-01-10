@extends('layouts.base.files')


@section('navsidebar')

    <ul class="nav nav-sidebar">
        <li class="active">
            <a href="javascript:">
                Create New Folder
            </a>
        </li>
        <li>
            <a href="/files/upload/{{ $folder->id }}">
                Upload File
            </a>
        </li>
    </ul>

@endsection


@section('_content')

    @parent

    {!! Form::open([
        'method' => 'post',
    ]) !!}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::text(
                'name', null, [
                    'class' => 'form-control',
                    'placeHolder' => 'Folder Name',
                    'autofocus' => 'autofocus',
                ]
            ) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}
    
@endsection
