@extends('layouts.app-breadcrumb')


@section('breadcrumb')

    @parent

    <ol class="breadcrumb">
        <li class="active">/</li>
    </ol>

@endsection


@section('_content')

    @parent

    <table class="table table-hover table-stripped">
        @for($i = 0;$i < 15;$i++)
            <tr>
                <td>home</td>
            </tr>
            <tr>
                <td>file</td>
            </tr>
        @endfor
    </table>
    <!--
    <form method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file">
        <input type="submit">
    </form>
    -->
    
@endsection
