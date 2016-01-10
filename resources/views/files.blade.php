@extends('layouts.base.files')


@section('_content')

    @parent

    @if(!(count($folder->folders) && count($folder->files)))
    <table class="table table-hover table-stripped">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($folder->folders as $folder)
                <tr>
                    <td>{{ $folder->name }}</td>
                </tr>
            @endforeach
            @foreach($folder->files as $file)
                <tr>
                    <td>{{ $file->name }}</td>
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
