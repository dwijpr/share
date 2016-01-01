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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <!-- Styles -->

        {!! Html::style('css/app.css') !!}
        {!! Html::style('assets/thirdparty/pnotify/dist/pnotify.css') !!}
        {!! Html::style('assets/thirdparty/pnotify/dist/pnotify.buttons.css') !!}
        {!! Html::style('assets/thirdparty/twbs-bootstrap/css/dashboard.css') !!}

        @yield('additional-styles')

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

                    @if (Auth::user())

                        <ul class="nav navbar-nav navbar-left">
                                <li><a href="/home">Home</a></li>
                        </ul>

                    @endif

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
                                    <li>
                                        <a href="/profile">
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Change Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/logout">
                                            <i class="fa fa-btn fa-sign-out"></i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        @endif

                    </ul>

                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav>

        @yield('content')

        {!! Html::script('js/jquery.min.js') !!}
        {!! Html::script('js/bootstrap.min.js') !!}
        {!! Html::script('assets/thirdparty/pnotify/dist/pnotify.js') !!}
        {!! Html::script('assets/thirdparty/pnotify/dist/pnotify.buttons.js') !!}

        @yield('additional-scripts')

        @if(fmsgs())
            <script type="text/javascript">
                var stack_bottomleft = {
                    "dir1": "right", "dir2": "up", "push": "top"
                };
                $(function(){
                    PNotify.prototype.options.styling = "fontawesome";
                    @foreach (fmsgs() as $message)
                        new PNotify({
                            title: '{{ $message['title'] }}',
                            text: '{{ $message['text'] }}',
                            type: '{{ $message['type'] }}',
                            buttons:{
                                sticker: false,
                                closer_hover: false,
                            },
                            addclass: "stack-bottomleft",
                            stack: stack_bottomleft,
                        });
                    @endforeach
                });
            </script>
        @endif
    </body>
</html>
