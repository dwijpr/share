@extends('layouts.base.files')


@section('_content')

    @parent

    @if(count($folder->folders) or count($folder->files))
    <table class="table table-hover table-stripped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($folder->folders as $_folder)
                <tr>
                    <td>{{ $_folder->name }}</td>
                    <td>folder</td>
                    <td>
                        <a 
                            href="#" 
                            class="btn btn-info"
                        >
                            <i class="fa fa-edit"></i>
                        </a>
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
                <tr>
                    <td>{{ $file->name }}</td>
                    <td>file</td>
                    <td>
                        <a 
                            href="#" 
                            class="btn btn-info"
                        >
                            <i class="fa fa-edit"></i>
                        </a>
                        {!! Form::open([
                            'url' => '#',
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
    @endif
    
@endsection
