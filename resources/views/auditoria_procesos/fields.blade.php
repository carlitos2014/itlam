<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
</div>

<!-- Proceso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proceso_id', 'Proceso Id:') !!}
    {!! Form::select('proceso_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Auditor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('auditor_id', 'Auditor Id:') !!}
    {!! Form::select('auditor_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('auditoriaProcesos.index') !!}" class="btn btn-default">Cancel</a>
</div>
