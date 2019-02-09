<!-- Id Field -->

<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-3 form-group">
            {!! Form::label('id', 'Id:') !!}
            <pre>{!! $auditoria->id !!}</pre>
        </div>

        <!-- Created At Field -->
        <div class="col-xs-3 form-group">
            {!! Form::label('created_at', 'Created At:') !!}
            <pre>{!! $auditoria->created_at !!}</pre>
        </div>

        <!-- Updated At Field -->
        <div class="col-xs-3 form-group">
            {!! Form::label('updated_at', 'Updated At:') !!}
            <pre>{!! $auditoria->updated_at !!}</pre>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <!-- Fecha Field -->
        <div class="col-xs-6 form-group">
            {!! Form::label('fecha', 'Fecha:') !!}
            <pre>{!! $auditoria->fecha !!}</pre>
        </div>

        <!-- Lugar Field -->
        <div class="col-xs-6 form-group">
            {!! Form::label('lugar', 'Lugar:') !!}
            <pre>{!! $auditoria->lugar !!}</pre>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12">
        <!-- Objetivos Field -->
        <div class="col-xs-6 form-group">
            {!! Form::label('objetivos', 'Objetivos:') !!}
            <pre>{!! $auditoria->objetivos !!}</pre>
        </div>

        <!-- Alcances Field -->
        <div class="col-xs-6 form-group">
            {!! Form::label('alcances', 'Alcances:') !!}
            <pre>{!! $auditoria->alcances !!}</pre>
        </div>

        <!-- Criterios Field -->
        <div class="col-xs-6 form-group">
            {!! Form::label('criterios', 'Criterios:') !!}
            <pre>{!! $auditoria->criterios !!}</pre>
        </div>

        <!-- Observaciones Field -->
        <div class="col-xs-6 form-group">
            {!! Form::label('observaciones', 'Observaciones:') !!}
            <pre>{!! $auditoria->observaciones !!}</pre>
        </div>
    </div>
</div>


