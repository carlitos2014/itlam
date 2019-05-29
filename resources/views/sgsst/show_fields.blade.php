@include('flash::message')

<!-- Nombre -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $sgsst->nombre !!}</p>
</div>

<!-- Descripcion -->
<div class="form-group">
    {!! Form::label('description', 'Descripción:') !!}
    <p>{!! $sgsst->description !!}</p>
</div>