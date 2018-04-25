<div class="form-group {{ $errors->has('tipoDireccion_idtipoDireccion') ? 'has-error' : ''}}">
@php($direcciones=App\tipoDireccion::pluck('tipo', 'idtipoDireccion'))
    <label for="tipoDireccion_idtipoDireccion" class="col-md-4 control-label">{{ 'Tipo' }}</label>
    <div class="col-md-6">
       
        {!! Form::SELECT('tipoDireccion_idtipoDireccion',$direcciones ,null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('tipoDireccion_idtipoDireccion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('calle') ? 'has-error' : ''}}">
    <label for="calle" class="col-md-4 control-label">{{ 'Calle' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="calle" type="text" id="calle" value="{{ $direccion->calle or ''}}" >
        {!! $errors->first('calle', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('numero') ? 'has-error' : ''}}">
    <label for="numero" class="col-md-4 control-label">{{ 'Numero' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="numero" type="text" id="numero" value="{{ $direccion->numero or ''}}" >
        {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('colonia') ? 'has-error' : ''}}">
    <label for="colonia" class="col-md-4 control-label">{{ 'Colonia' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="colonia" type="text" id="colonia" value="{{ $direccion->colonia or ''}}" >
        {!! $errors->first('colonia', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ciudad') ? 'has-error' : ''}}">
    <label for="ciudad" class="col-md-4 control-label">{{ 'Ciudad' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ciudad" type="text" id="ciudad" value="{{ $direccion->ciudad or ''}}" >
        {!! $errors->first('ciudad', '<p class="help-block">:message</p>') !!}
    </div>
</div> 
<div class="form-group {{ $errors->has('persona_idpersona') ? 'has-error' : ''}}">
     @php($personas=App\persona::pluck('nombre', 'idpersona'))
  
    <label for="persona_idpersona" class="col-md-4 control-label">{{ 'Persona' }}</label>
    <div class="col-md-6">
        {!! Form::SELECT('persona_idpersona',$personas ,null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('persona_idpersona', '<p class="help-block">:message</p>') !!}
    </div>
</div> 

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
