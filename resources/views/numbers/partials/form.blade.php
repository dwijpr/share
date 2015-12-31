{!! Form::open([
    'url' => 'profile/number',
    'class' => 'form-horizontal simpleUpdateForm',
]) !!}

    {{ method_field('post') }}
    <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Value</label>
        <div class="col-md-8">
            {!! Form::text('value', null, ['class' => 'form-control']) !!}

            @if ($errors->has('value'))
                <span class="help-block">
                    <strong>{{ $errors->first('value') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Label</label>

        <div class="col-md-8">
            {!! Form::text('label', null, ['class' => 'form-control']) !!}

            @if ($errors->has('label'))
                <span class="help-block">
                    <strong>{{ $errors->first('label') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-8 col-sm-offset-4">
            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>

{!! Form::close() !!}
