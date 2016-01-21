@extends('layouts.base.default')


@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            {!! Form::open([
                'class' => 'form-horizontal',
            ]) !!}

                <div class="col-sm-4">
                    <div class="well">
                        {!! Html::image(
                            ppSrc($user)
                            , $user->name.' pic'
                            , ['class' => 'img-responsive']
                        ) !!}
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name</label>
                        <div class="col-md-6">
                            <label class="control-label">
                                {{ $user->name }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">E-Mail Address</label>
                        <div class="col-md-6">
                            <label class="control-label">
                                {{ $user->email }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Gender</label>
                        <div class="col-md-6">
                            <label class="control-label">
                                {{ $user->gender?'Male':'Female' }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-4">
                            @if(count($user->numbers))
                                <div class="well">
                                    <table>
                                        @foreach($user->numbers as $number)
                                            <tr>
                                                <td>
                                                    <b>{{ $number->label }}</b>
                                                </td>
                                                <td style="padding: 0 5px;">:</td>
                                                <td>{{ $number->value }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}
            
        </div>
    </div>

@endsection