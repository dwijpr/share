@extends('layouts.base.files')


@section('_content')

    @parent

    <table class="table table-hover table-stripped">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @for($i = 0;$i < 15;$i++)
                <tr>
                    <td>home</td>
                </tr>
                <tr>
                    <td>file</td>
                </tr>
            @endfor
        </tbody>
    </table>
    <!--
    <form method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file">
        <input type="submit">
    </form>
    -->
    
@endsection
