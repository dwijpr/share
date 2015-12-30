@extends('layouts.base')

@section('content')

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="/">
                    {{ config('app.name') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="spark-navbar-collapse">

                <ul class="nav navbar-nav navbar-right">

                    @if (Auth::guest())

                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Register</a></li>

                    @else

                        @can('dashboard')

                            <li><a href="/dashboard">Dashboard</a></li>

                        @endcan

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/logout"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>

                    @endif

                </ul>

            </div>
        </div>
    </nav>

@endsection
