@extends('layouts.base.breadcrumb')


@section('breadcrumb')

    <ol class="breadcrumb">
        <li><a href="/profile">Profile</a></li>
        <li class="active">Manage Numbers</li>
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
                            @if(!count($user->numbers))
                                <h3 class="text-center">
                                    You don't have any numbers!
                                </h3>
                            @else
                                @include('numbers.partials.table')
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="well">
                                <h4 class="text-center">Add Number</h4>
                                @include('numbers.partials.form', [
                                    'action' => '/profile/number',
                                    'method' => 'post',
                                    'label' => 'Create',
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
