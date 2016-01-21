@extends('layouts.base.default')


@section('title', 'Home')


@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @foreach($activities as $activity)

                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! translate($activity) !!}
                    </div>
                </div>

            @endforeach
        </div>
    </div>

@endsection
