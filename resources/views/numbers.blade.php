@extends('layouts.app')

@section('content')

    @parent

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{auth()->user()->name}}'s Numbers
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                @if(!count($user->numbers))
                                    <h3 class="text-center">
                                        You don't have any numbers!
                                    </h3>
                                @else
                                    @include('numbers.partials.table')
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="well">
                                    <h4 class="text-center">Add Number</h4>
                                    @include('numbers.partials.form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('additional-scripts')
    <script>
    var el;
        $.fn.simpleUpdate = function(options){
            var settings = $.extend({
                id: "id",
                action: "",
                form: ".simpleUpdateForm",
                properties: [],
                method: 'patch'
            }, options );
     
            this.click(function(){
                var el = $(this);
                var data = el.data('simpleUpdate');
                var form = $("form"+settings.form);

                form.attr('action', settings.action+data[settings.id]);

                var _method = form.find("[name='_method']");
                _method.val(settings.method);

                for(var i = 0;i < settings.properties.length;i++){
                    var prop = settings.properties[i];
                    var _el = form.find("[name='"+prop+"']");
                    _el.val(data[prop]);
                }

                form.find("[type=submit]").val("Update");
            });
        }
        $(".simpleUpdate").simpleUpdate({
            properties: ['value', 'label'],
            action: '/profile/number/',
        });
    </script>
@endsection