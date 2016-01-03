@extends('layouts.app')

@section('_content')

    @parent

    <form method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file">
        <input type="submit">
    </form>
    
@endsection
