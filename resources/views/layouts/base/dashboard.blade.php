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
                        cursor: pointer;
                    "
                >
                    <i 
                        class="fa fa-navicon"
                        style="
                            position: absolute;
                            left: -16px;
                            top: 28px;
                            font-size: 16px;
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

@section('scripts')

    {!! Html::script('assets/thirdparty/twbs-bootstrap/js/holder.min.js') !!}

    <script>
        $(function(){
            var sidenavToggle = true;
            if($(window).width() < 768){
                sidenavToggle = false;
            }

            function hide(){
                $('#sidenav').removeClass('col-xs-6');
                $('#sidenav').removeClass('col-sm-3');
                $('#sidenav').removeClass('col-md-2');

                $('#sidenav').addClass('hidden');

                $('#page-content').removeClass('col-xs-6');
                $('#page-content').removeClass('col-xs-offset-6');
                $('#page-content').removeClass('col-sm-9');
                $('#page-content').removeClass('col-sm-offset-3');
                $('#page-content').removeClass('col-md-10');
                $('#page-content').removeClass('col-md-offset-2');

                $('#page-content').addClass('col-sm-12');
            }

            function show(){
                $('#sidenav').addClass('col-xs-6');
                $('#sidenav').addClass('col-sm-3');
                $('#sidenav').addClass('col-md-2');

                $('#sidenav').removeClass('hidden');

                $('#page-content').addClass('col-xs-6');
                $('#page-content').addClass('col-xs-offset-6');
                $('#page-content').addClass('col-sm-9');
                $('#page-content').addClass('col-sm-offset-3');
                $('#page-content').addClass('col-md-10');
                $('#page-content').addClass('col-md-offset-2');

                $('#page-content').removeClass('col-sm-12');
            }

            if(!sidenavToggle){
                hide();
            }

            $('#toggle-sidenav').click(function(){
                if(sidenavToggle){
                    hide();
                }else{
                    show();
                }
                sidenavToggle = !sidenavToggle;
            });
        });
    </script>

@endsection
