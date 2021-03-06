@extends('layouts.base.dashboard')


@section('navsidebar')

    <ul class="nav nav-sidebar">
        <li>
            <a href="{{ url('/dashboard/users') }}">
                Users
            </a>
        </li>
    </ul>

    <hr>

    <ul class="nav nav-sidebar">
        <li>
            <a href="{{ url('/dashboard/user/new') }}">Create New User</a>
        </li>
    </ul>

@endsection


@section('dashboard-title', 'Edit User')


@section('_content')

    @include(
        'dashboard.users.partials.form', [
            'action' => '/dashboard/user/update/'.$user->id,
            'method' => 'PATCH',
            'user' => $user,
            'label' => 'Update',
        ]
    )

@endsection