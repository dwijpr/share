@extends('layouts.app')


@section('breadcrumb')

    <ol class="breadcrumb">
        <li><a href="/profile">Profile</a></li>
        <li><a href="/profile/numbers">Manage Numbers</a></li>
        <li class="active">Edit</li>
    </ol>

@endsection


@section('_content')

    @parent

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{auth()->user()->name}}'s Numbers
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="well">
                                <h4 class="text-center">Edit Number</h4>
                                @include(
                                    'numbers.partials.form'
                                    , [
                                        'action' => '/profile/number/'.$number->id,
                                        'method' => 'patch',
                                        'label' => 'Update'
                                    ]
                                )
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
