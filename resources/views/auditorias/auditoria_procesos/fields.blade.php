@include('widgets.datepicker')

<!-- Auditoria Id Field -->
{{ Form::hidden('auditoria_id', $auditoria) }}

<!-- Proceso Id Field -->
@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'proceso_id', 'label'=>'Proceso', 'data'=>$arrProcesos, 'options'=>[]]) 

<!-- Auditor Id Field -->
@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'auditor_id', 'label'=>'Auditor', 'data'=>$arrAuditores, 'options'=>[]]) 

<!-- Fecha Field -->
@include('widgets.forms.input', ['type'=>'date', 'column'=>4, 'name'=>'fecha', 'label'=>'Fecha' ])
@include('widgets.forms.input', ['type'=>'time', 'column'=>4, 'name'=>'hora_inicio', 'label'=>'Hora Inicio' ])
@include('widgets.forms.input', ['type'=>'time', 'column'=>4, 'name'=>'hora_fin', 'label'=>'Hora Fin' ])


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('auditorias.edit',[$auditoria]) !!}" class="btn btn-default">Cancelar</a>
</div>
