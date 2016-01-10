@extends('layouts.base')


@section('styles')

    <style>
        .sidebar{
            top: 95px;
        }
        div.page-header{
            background: #F5F5F5;
        }
        div.page-header .breadcrumb li:last-child{
            padding-right: 16px;
        }
        #page-content .breadcrumb{
            margin-bottom: 4px;
            background: none;
        }
    </style>

@endsection


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div 
                class="col-xs-6 col-sm-3 col-md-2 sidebar"
                id="sidenav"
            >

                    @section('navsidebar')

                        <ul class="nav nav-sidebar">
                            <li>
                                <a href="javascript:">
                                    Create New Folder
                                </a>
                            </li>
                            <li>
                                <a href="/files/upload/{{ $folder->id }}">
                                    Upload File
                                </a>
                            </li>
                        </ul>

                    @show

            </div>

            <div 
                class="col-xs-6 col-xs-offset-6 col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"
                id="page-content"
            >
                <div
                    class="page-header"
                    style="
                        position: fixed;
                        top: 50px;
                        left: 0;
                        right: 0;
                        background: #fff;
                        padding-top: 16px;
                        padding-left: 32px;
                        z-index: 1001;
                        white-space: nowrap;
                        overflow: auto;
                    "
                >
                    <i 
                        class="fa fa-navicon"
                        style="
                            position: absolute;
                            left: 12px;
                            top: 28px;
                            font-size: 16px;
                            cursor: pointer;
                        "
                        id="toggle-sidenav"
                    ></i>
                    <ol class="breadcrumb">
                        <li class="active">/</li>
                    </ol>
                </div>
                <div style="padding-top: 64px;">

                    @yield('_content')

                </div>
            </div>

        </div>
    </div>

@endsection


@include('layouts.includes.sidenav-script')