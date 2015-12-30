@extends('layouts.base')

@section('additional-styles')

    {!! Html::style('assets/thirdparty/twbs-bootstrap/css/dashboard.css') !!}

@endsection

@section('content')

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    {{ config('app.name') }}
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="/home">Home</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/logout"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">

                    @section('navsidebar')

                        <li class="active">
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

                    @show

                </ul>
            </div>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header">
                    Dashboard
                    <small>
                        - @yield('dashboard-title', 'Untitled')
                    </small>
                </h1>
                @yield('_content')
            </div>

        </div>
    </div>

@endsection

@section('additional-scripts')

    {!! Html::script('assets/thirdparty/twbs-bootstrap/js/holder.min.js') !!}

@endsection
