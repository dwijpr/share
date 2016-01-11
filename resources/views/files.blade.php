@extends('layouts.base.files')


@section('_content')

    @parent

    @if(count($folder->folders) or count($folder->files))
    <table class="table table-hover table-stripped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($folder->parent_id)
                <tr>
                    <td 
                        colspan="3"
                        onclick="window.location = '/files/{{ $folder->parent_id }}'" 
                        style="cursor: pointer;" 
                    >
                        ..
                    </td>
                </tr>
            @endif
            @foreach($folder->folders as $_folder)
                <tr
                    onclick="window.location = '/files/{{ $_folder->id }}'"
                    style="cursor: pointer;"
                >
                    <td>
                        <i class="fa fa-folder"></i>
                        {{ $_folder->name }}
                    </td>
                    <td>
                        {!! Form::open([
                            'url' => '/files/folder/delete/'.$_folder->id,
                            'class' => 'form-horizontal',
                            'method' => 'delete',
                            'style' => 'display: inline-block;'
                        ]) !!}
                            <button 
                                class="btn btn-danger"
                                onclick="return confirm('are you sure?')"
                            >
                                <i class="fa fa-close"></i>
                            </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            @foreach($folder->files as $file)
                <tr
                    onclick="window.location = '/file/view/{{ $file->id }}'"
                    style="cursor: pointer;"
                >
                    <td>
                        <i class="fa fa-file"></i>
                        {{ $file->name }}
                    </td>
                    <td>
                        {!! Form::open([
                            'url' => '/file/'.$file->id,
                            'class' => 'form-horizontal',
                            'method' => 'delete',
                            'style' => 'display: inline-block;'
                        ]) !!}
                            <button 
                                class="btn btn-danger"
                                onclick="return confirm('are you sure?')"
                            >
                                <i class="fa fa-close"></i>
                            </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <h1 class="text-center">
            This folder is Empty
        </h1>
        <div class="text-center">
            <a 
                href="/files/{{ $folder->parent_id }}" 
                class="btn btn-default"
            >
                <i class="fa fa-sign-out"></i>
                ..
            </a>
            <a
                class="btn btn-primary"
                href="/files/folder/new/{{ $folder->id }}" 
            >
                <i class="fa fa-folder"></i>
                Create New Folder
            </a>
            <a
                href="/files/upload/{{ $folder->id }}"
                class="btn btn-info"
            >
                <i class="fa fa-upload"></i>
                Upload File
            </a>
        </div>
    @endif
    
@endsection
