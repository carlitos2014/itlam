@include('flash::message')
<!-- Profesores -->
@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'teachers_id', 
'label'=>'Profesor', 'data'=>$arrTeacher, 'options'=>['required']])
<!-- observaciones Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacion', 'Observación:') !!}
    {!! Form::text('observacion', null, ['class' => 'form-control', 'id' => 'description']) !!}
</div>
<!-- Ruta Field -->
<div>   
	@include('widgets.forms.input', ['type'=>'file', 'name'=>'ruta', 'label'=>'Archivo:
        <strong><em><h6>Tamaño Máximo: 2MB</h6></em></strong>','options'=>['accept' => '.png,.jpg,.pdf,.doc,.docx']]) 
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
  <a href="{!! route('asignacion.index') !!}" class="btn btn-default">Cancelar</a>
</div>

