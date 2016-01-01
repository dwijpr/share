@extends('layouts.base')


@section('additional-styles')
    
    <style>
        body{
            padding-top: 96px;
        }
        div.app-content{
            padding: 8px 15px;
        }
        ol.breadcrumb li{
            font-size: 16px;
        }
    </style>

@endsection


@section('content')

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-12">

                    @section('breadcrumb')

                        <!--
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Library</a></li>
                            <li class="active">Data</li>
                        </ol>
                        -->

                    @show

            </div>

            <div class="col-md-12">
                <div class="app-content">

                    @yield('_content')

                </div>
            </div>
        </div>
    </div>

@endsection
