@include('flash::message')

<!-- Observaciones -->
<div class="form-group">
    {!! Form::label('observacion', 'Observaciones:') !!}
    <p>{!! $asignaciones->observacion !!}</p>
</div>

