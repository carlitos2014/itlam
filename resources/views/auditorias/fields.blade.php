@include('widgets.datepicker')

<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::datetime('fecha', null, ['class' => 'form-control datepicker']) !!}
</div>

<!-- Lugar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lugar', 'Lugar:') !!}
    {!! Form::text('lugar', null, ['class' => 'form-control']) !!}
</div>

<!-- Lugar Auditor lider -->
@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'auditor_lider_id', 'label'=>'Auditor lider', 'data'=>$arrAuditores, 'options'=>['required']]) 

<!-- Lugar Auditores internos -->
@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'auditores_id', 'label'=>'Auditores internos', 'data'=>$arrAuditores, 'multiple'=>true, 'options'=>['']]) 

<!-- Objetivos Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('objetivos', 'Objetivos:') !!}
    {!! Form::textarea('objetivos', null, ['class' => 'form-control', 'size' => '20x3', 'maxlength' => '300', 'style' => 'resize: vertical']) !!}
</div>

<!-- Alcances Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alcances', 'Alcances:') !!}
    {!! Form::textarea('alcances', null, ['class' => 'form-control', 'size' => '20x3', 'maxlength' => '300', 'style' => 'resize: vertical']) !!}
</div>

<!-- Criterios Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('criterios', 'Criterios:') !!}
    {!! Form::textarea('criterios', null, ['class' => 'form-control', 'size' => '20x3', 'maxlength' => '300', 'style' => 'resize: vertical']) !!}
</div>

<!-- Observaciones Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observaciones', 'Observaciones:') !!}
    {!! Form::textarea('observaciones', null, ['class' => 'form-control', 'size' => '20x3', 'maxlength' => '300', 'style' => 'resize: vertical']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('auditorias.index') !!}" class="btn btn-default">Cancel</a>
</div>
