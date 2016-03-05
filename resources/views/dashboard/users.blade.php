@extends('layouts.base.dashboard')


@section('navsidebar')

    @for($i = 0;$i < 1;$i++)
        <ul class="nav nav-sidebar">
            <li class="active">
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
    @endfor

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
                @foreach ($users as $_user)
                    <tr>
                        <td><?= $i ?></td>
                        <td>{{ $_user->name }}</td>
                        <td>{{ $_user->email }}</td>
                        <td>
                            <?php $rolesCount = 0; ?>
                            @foreach($_user->roles as $role)
                                <div>{{ $role->name }}</div>
                                <?php $rolesCount++; ?>
                            @endforeach
                            @if(!$rolesCount)
                                -
                            @endif
                        </td>
                        <td>
                            <a 
                                href="{{ url('/dashboard/user/edit/'.$_user->id) }}" 
                                class="btn btn-info"
                            >
                                Edit
                            </a>
                            <form 
                                style="display: inline-block;" 
                                action="/dashboard/user/{{ $_user->id }}"
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