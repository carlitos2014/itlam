{{-- @include('widgets.datepicker') --}}
@include('widgets.select2')

<!-- Fecha Field -->
<div class="col-xs-12 col-sm-6"> 
    @include('widgets.forms.input', ['type'=>'text', 'name'=>'name', 'label'=>'Nombre interno', 'options'=>['maxlength' => '15'] ])
    @include('widgets.forms.input', ['type'=>'text', 'name'=>'display_name', 'label'=>'Nombre para mostrar', 'options'=>['maxlength' => '50'] ])
    @include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'description', 'label'=>'Descripción', 'options'=>['maxlength' => '100', 'required'] ])
</div>
<div class="col-xs-12 col-sm-6"> 
    @include('widgets.forms.input', ['type'=>'select', 'name'=>'permissions', 'label'=>'Permisos', 'data'=>$arrPermGroups, 'multiple'=>true])
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('auth.roles.index') !!}" class="btn btn-default">Cancel</a>
</div>
