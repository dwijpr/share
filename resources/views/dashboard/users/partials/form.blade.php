<form 
    class="form-horizontal" 
    role="form" 
    method="POST" 
    action="{{ $action }}"
>
    {!! csrf_field() !!}
    {{ method_field($method) }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Name</label>

        <div class="col-md-6">
            {!! Form::text(
                'name'
                , @$forceEmpty?null:@$user->name
                , ['class' => 'form-control']
            ) !!}

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
            {!! Form::text(
                'email'
                , @$forceEmpty?null:@$user->email
                , ['class' => 'form-control']
            ) !!}

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
                        , (@$forceEmpty?old('gender'):
                            ($user->gender?:old('gender'))
                        )==1?true:false
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
                        , (@$forceEmpty?old('gender'):
                            ($user->gender?:old('gender'))
                        )==0?true:false
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

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Password</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Confirm Password</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i>{{ $label }}
            </button>
        </div>
    </div>
</form>
