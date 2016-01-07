@extends('layouts.base.dashboard')


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

    @include(
        'dashboard.users.partials.form', [
            'action' => '/dashboard/user/create',
            'method' => 'POST',
            'user' => @$user,
            'label' => 'Create',
        ]
    )

@endsection