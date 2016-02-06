@extends('layouts.base.breadcrumb')


@section('breadcrumb')

    <ol class="breadcrumb">
        <li class="active">Profile</li>
    </ol>

@endsection


@section('_content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            {!! Form::open([
                'url' => 'profile/update',
                'class' => 'form-horizontal',
                'method' => 'patch',
            ]) !!}

                <div class="col-sm-4">
                    <div class="well">
                        {!! Html::image(
                            ppSrc($user)
                            , $user->name.' pic'
                            , ['class' => 'img-responsive']
                        ) !!}
                        <h3>
                            Browse Your Image Files to 
                            set a new Profile Picture
                        </h3>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Name</label>
                        <div class="col-md-6">
                            {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Gender</label>

                        <div class="col-md-6">
                            <div class="radio" style="display: inline-block;">
                                <label>
                                    {!! Form::radio(
                                        'gender'
                                        , 1 
                                        , $user->gender===1
                                    ) !!}
                                    Male
                                </label>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="radio" style="display: inline-block;">
                                <label>
                                    {!! Form::radio(
                                        'gender'
                                        , 0 
                                        , $user->gender===0
                                    ) !!}
                                    Female
                                </label>
                            </div>

                            @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('auto_share') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Auto Share</label>

                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox(
                                        'auto_share'
                                        , 1, $user->auto_share
                                    ) !!}
                                </label>
                                @if ($errors->has('auto_share'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('auto_share') }}</strong>
                                    </span>
                                @endif
                            </div>
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
                            <a href="/profile/numbers" class="btn btn-info">Manage Numbers</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-4">
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}
            
        </div>
    </div>

@endsection