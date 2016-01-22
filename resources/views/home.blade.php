@extends('layouts.base.default')


@section('title', 'Home')


@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @foreach($activities as $activity)

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-8">
                                {!! translate($activity) !!}
                            </div>
                            <div class="col-sm-4 text-right text-muted">
                                {!! humanRead($activity) !!}
                                <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

@endsection
