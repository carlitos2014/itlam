<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Motivo Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('motivo', 'Motivo:') !!}
    {!! Form::textarea('motivo', null, ['class' => 'form-control']) !!}
</div>

<!-- Grado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grado', 'Grado:') !!}
    {!! Form::select('grado',$gradoNoConformidad, null, ['class' => 'form-control'])!!}

</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('noConformidades.index') !!}" class="btn btn-default">Cancel</a>
</div>
