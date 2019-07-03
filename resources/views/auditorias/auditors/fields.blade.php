
<!-- Lugar Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
	@include('widgets.forms.input', ['type'=>'email', 'column'=>320, 'name'=>'email', 'label'=>'Correo electrónico'])
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('auditorias.auditors.index') !!}" class="btn btn-default">Cancelar</a>
</div>
