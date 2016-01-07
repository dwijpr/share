@extends('layouts.base')


@section('additional-styles')
    
    <style>
        body{
            padding-top: 50px;
        }
        div.app-content{
            padding: 8px 15px;
            padding-top: 32px;
        }
        div.footer{
            padding-top: 32px;
        }
    </style>

@endsection


@section('content')

    <div class="container">
        <div class="row">
        
            @section('breadcrumb')
                <div class="col-md-12">

                        <div class="_affix">

                                <!--
                                <ol class="breadcrumb">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Library</a></li>
                                    <li class="active">Data</li>
                                </ol>
                                -->

                        </div>

                </div>
            @endsection

            <div class="col-md-12">
                <div class="app-content">

                    @yield('_content')

                </div>
                <div class="footer text-center">
                    <p class="lead">
                        <a href="/">
                            {{ config('app.name') }}&copy;{{ date('Y') }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
