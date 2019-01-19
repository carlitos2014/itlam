<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Ruta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ruta', 'Archivo:') !!}
    {!! Form::file('ruta', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
  <a href="{!! route('cargarArchivos.index') !!}" class="btn btn-default">Cancelar</a>
</div>

