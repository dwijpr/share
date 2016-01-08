@extends('layouts.base')


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div 
                class="col-xs-6 col-sm-3 col-md-2 sidebar"
                id="sidenav"
            >

                    @section('navsidebar')

                        <ul class="nav nav-sidebar">
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
                        </ul>

                    @show

            </div>

            <div 
                class="col-xs-6 col-xs-offset-6 col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"
                id="page-content"
            >
                <h1
                    class="page-header"
                    style="
                        position: fixed;
                        top: 50px;
                        width: 100%;
                        background: #fff;
                        padding-top: 16px;
                        z-index: 1;
                    "
                >
                    <i 
                        class="fa fa-navicon"
                        style="
                            position: absolute;
                            left: -16px;
                            top: 28px;
                            font-size: 16px;
                            cursor: pointer;
                        "
                        id="toggle-sidenav"
                    ></i>
                    Dashboard
                    <small>
                        - @yield('dashboard-title', 'Untitled')
                    </small>
                </h1>
                <div style="padding-top: 64px;">

                    @yield('_content')

                </div>
            </div>

        </div>
    </div>

@endsection


@include('layouts.includes.sidenav-script')