@include('flash::message')

<!-- Observaciones -->
<div class="form-group">
    {!! Form::label('observacion', 'Observaciones:') !!}
    <p>{!! $asignacion->observacion !!}</p>
</div>

