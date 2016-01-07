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
                    {!! Html::image(
                        'img/default-female.png', auth()->user()->name.' pic'
                        , ['class' => 'well img-responsive']
                    ) !!}
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