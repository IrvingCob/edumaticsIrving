<div class="form-group {{ $errors->has('numero') ? 'has-error' : ''}}">
    <label for="numero" class="col-md-4 control-label">{{ 'Numero' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="numero" type="text" id="numero" value="{{ $telefono->numero or ''}}" >
        {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tipoTelefono_idtipoTelefono') ? 'has-error' : ''}}">
    @php($telefonos=App\tipoTelefono::pluck('tipo', 'idtipoTelefono'))
    <label for="tipoTelefono_idtipoTelefono" class="col-md-4 control-label">{{ 'Tiptelefono Idtipotelefono' }}</label>
    <div class="col-md-6">
             {!! Form::SELECT('tipoTelefono_idtipoTelefono',$telefonos ,null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first(' ', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('persona_idpersona') ? 'has-error' : ''}}">
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
