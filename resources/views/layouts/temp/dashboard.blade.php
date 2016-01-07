@extends('layouts.base')


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">

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
                class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"
            >
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
