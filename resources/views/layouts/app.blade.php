<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} | @yield('title', 'Untitled')</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    {!! Html::style('css/app.css') !!}
    {!! Html::style('assets/thirdparty/pnotify/dist/pnotify.css') !!}
    {!! Html::style('assets/thirdparty/pnotify/dist/pnotify.buttons.css') !!}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="/">
                    {{ config('app.name') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="spark-navbar-collapse">

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
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
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('assets/thirdparty/pnotify/dist/pnotify.js') !!}
    {!! Html::script('assets/thirdparty/pnotify/dist/pnotify.buttons.js') !!}

    @if(fmsgs())
        <script type="text/javascript">
            $(function(){
                PNotify.prototype.options.styling = "fontawesome";
                @foreach (fmsgs() as $message)
                    new PNotify({
                        title: '{{ $message['title'] }}',
                        text: '{{ $message['text'] }}',
                        type: '{{ $message['type'] }}',
                        buttons:{
                            sticker: false,
                        },
                    });
                @endforeach
            });
        </script>
    @endif
</body>
</html>
