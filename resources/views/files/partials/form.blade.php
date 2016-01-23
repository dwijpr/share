{!! Form::open([
    'method' => 'post',
    'url' => @$action?:null,
]) !!}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::text(
            'name', @$item?$item->name:null, [
                'class' => 'form-control',
                'placeHolder' => (@$placeHolder?:'Folder').' Name',
                'autofocus' => 'autofocus',
            ]
        ) !!}

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit(@$label?:'Create', ['class' => 'btn btn-primary']) !!}
    </div>

{!! Form::close() !!}
