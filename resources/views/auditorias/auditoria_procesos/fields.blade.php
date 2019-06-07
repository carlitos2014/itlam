@include('widgets.datepicker')

<!-- Fecha Field -->
<div class="form-group col-sm-4">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
</div>


@include('widgets.forms.input', ['type'=>'time', 'column'=>4, 'name'=>'hora_inicio', 'label'=>'Hora Inicio' ])
@include('widgets.forms.input', ['type'=>'time', 'column'=>4, 'name'=>'hora_fin', 'label'=>'Hora Fin' ])

<!-- Proceso Id Field -->
@include('widgets.forms.input', ['type'=>'text', 'column'=>6, 'name'=>'auditoria_id', 'label'=>'Auditoria', 'value'=>$auditoria, 'options'=>['required','readonly']]) 

<!-- Proceso Id Field -->
@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'proceso_id', 'label'=>'Proceso', 'data'=>$arrProceso, 'options'=>['']]) 

<!-- Auditor Id Field -->
@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'auditor_id', 'label'=>'Auditor', 'data'=>$arrAuditores, 'options'=>['']]) 

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('auditorias.edit',[$auditoria]) !!}" class="btn btn-default">Cancelar</a>
</div>
