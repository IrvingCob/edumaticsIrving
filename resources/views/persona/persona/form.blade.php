{!! Form::open(['url' => '/persona/persona', 'class' => 'form-horizontal','method'=> 'post', 'files'=> true]) !!}
<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
                {!! Form::label('foto', 'Fotografía', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!!Form::file('foto')!!}
                </div>
            </div>
<div class="form-group {{ $errors->has('rfc') ? 'has-error' : ''}}">
    <label for="rfc" class="col-md-4 control-label">{{ 'Rfc' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="rfc" type="text" id="rfc" value="{{ $persona->rfc or ''}}" >
        {!! $errors->first('rfc', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('curp') ? 'has-error' : ''}}">
    <label for="curp" class="col-md-4 control-label">{{ 'Apellidopaterno' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="curp" type="text" id="curp" value="{{ $persona->curp or ''}}" >
        {!! $errors->first('curp', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('apellidoPaterno') ? 'has-error' : ''}}">
    <label for="apellidoPaterno" class="col-md-4 control-label">{{ 'Apellidopaterno' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="apellidoPaterno" type="text" id="apellidoPaterno" value="{{ $persona->apellidoPaterno or ''}}" >
        {!! $errors->first('apellidoPaterno', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('apellidoMaterno') ? 'has-error' : ''}}">
    <label for="apellidoMaterno" class="col-md-4 control-label">{{ 'Apellidomaterno' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="apellidoMaterno" type="text" id="apellidoMaterno" value="{{ $persona->apellidoMaterno or ''}}" >
        {!! $errors->first('apellidoMaterno', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $persona->nombre or ''}}" >
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('edad') ? 'has-error' : ''}}">
    <label for="edad" class="col-md-4 control-label">{{ 'Edad' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="edad" type="text" id="edad" value="{{ $persona->edad or ''}}" >
        {!! $errors->first('edad', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
