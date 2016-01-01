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

        @yield('content')

        {!! Html::script('js/jquery.min.js') !!}
        {!! Html::script('js/bootstrap.min.js') !!}
        {!! Html::script('assets/thirdparty/pnotify/dist/pnotify.js') !!}
        {!! Html::script('assets/thirdparty/pnotify/dist/pnotify.buttons.js') !!}

        @yield('additional-scripts')

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
                                closer_hover: false,
                            },
                        });
                    @endforeach
                });
            </script>
        @endif
    </body>
</html>
