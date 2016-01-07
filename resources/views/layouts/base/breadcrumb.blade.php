@extends('layouts.base')


@section('styles')

    <style>
        ._content{
            padding-top: 72px;
        }
        ._affix{
            position: fixed;
            left: 0;
            width: 100%;
            z-index: 1;
            border-bottom: 1px solid #ccc;
            overflow: auto;
            background: #f5f5f5;
        }
        ._affix .breadcrumb{
            padding-top: 16px;
            margin-bottom: 0;
            white-space: nowrap;
            list-style: none;
            list-style-position: inside;
            background: none;
        }
        ._affix .breadcrumb li{
            font-size: 16px;
            display: inline-block;
        }
        ._affix .breadcrumb li:last-child{
            padding-right: 16px;
        }
    </style>

@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="_affix">

                @yield('breadcrumb')

            </div>

        </div>
    </div>

    <div class="_content">

        @yield('_content')

    </div>

@endsection