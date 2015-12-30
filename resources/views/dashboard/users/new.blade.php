@extends('layouts.dashboard')


@section('navsidebar')

    <ul class="nav nav-sidebar">
        <li>
            <a href="/dashboard">
                Overview
            </a>
        </li>
        <li>
            <a href="/dashboard/users">
                Users
            </a>
        </li>
        <li><a href="#">Reports</a></li>
    </ul>

    <hr>

    <ul class="nav nav-sidebar">
        <li class="active">
            <a href="/dashboard/user/new">Create New User</a>
        </li>
    </ul>

@endsection


@section('dashboard-title', 'Create New User')


@section('_content')

    <form 
        class="form-horizontal" 
        role="form" 
        method="POST" 
        action="{{ url('/dashboard/user/create') }}"
    >
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Name</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
                <input type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Confirm Password</label>

            <div class="col-md-6">
                <input type="password" class="form-control" name="password_confirmation">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i>Create
                </button>
            </div>
        </div>
    </form>

@endsection