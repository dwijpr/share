@extends('layouts.dashboard')


@section('navsidebar')

    <ul class="nav nav-sidebar">
        <li>
            <a href="/dashboard">
                Overview
            </a>
        </li>
        <li class="active">
            <a href="/dashboard/users">
                Users
            </a>
        </li>
        <li><a href="#">Reports</a></li>
    </ul>

    <hr>

    <ul class="nav nav-sidebar">
        <li>
            <a href="/dashboard/user/new">Create New User</a>
        </li>
    </ul>

@endsection


@section('dashboard-title', 'Users')


@section('_content')

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($users as $user)
                    <tr>
                        <td><?= $i ?></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <?php $rolesCount = 0; ?>
                            @foreach($user->roles as $role)
                                <div>{{ $role->name }}</div>
                                <?php $rolesCount++; ?>
                            @endforeach
                            @if(!$rolesCount)
                                -
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-info">Edit</button>
                            <form 
                                style="display: inline-block;" 
                                action="/dashboard/user/{{ $user->id }}"
                                method="POST" 
                            >
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button 
                                    class="btn btn-danger"
                                    onclick="return confirm('are you sure?')"
                                >Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i+=1; ?>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection