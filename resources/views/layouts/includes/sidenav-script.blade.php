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
