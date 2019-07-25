
<!-- Lugar Field -->
<div class="form-group col-sm-12">
    @include('widgets.forms.input', ['type'=>'text',  'name'=>'cargo', 'label'=>'Cargo'])

</div>
<div class="form-group col-sm-12">
	@include('widgets.forms.input', ['type'=>'file', 'name'=>'filename', 'label'=>'Filename'])
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('app.firmas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
