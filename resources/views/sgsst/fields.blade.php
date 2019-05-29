@include('flash::message')

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Descripción:') !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
</div>

<!-- Ruta Field -->
<div class="form-group col-sm-6">
	<strong><em><h6>Tamaño Máximo: 2MB</h6></em></strong>
    {!! Form::label('ruta', 'Archivo:') !!}
    {!! Form::file('ruta', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
  <a href="{!! route('sgsst_s.index') !!}" class="btn btn-default">Cancelar</a>
</div>

