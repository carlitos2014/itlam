
@include('widgets.datepicker')


@include('widgets.forms.input', ['type'=>'date', 'column'=>4, 'name'=>'fecha', 'label'=>'Fecha y hora', 'options'=>['required']])

@include('widgets.forms.input', ['type'=>'select', 'column'=>8, 'name'=>'lugar', 'label'=>'Lugar', 'options'=>['maxlength' => '50'] ])


@include('widgets.forms.input', ['type'=>'textarea', 'name'=>'objetivos', 'label'=>'Objetivos', 'options'=>['maxlength' => '300'] ])

@include('widgets.forms.input', ['type'=>'textarea', 'name'=>'alcances', 'label'=>'Alcances', 'options'=>['maxlength' => '300'] ])

@include('widgets.forms.input', ['type'=>'textarea', 'name'=>'criterios', 'label'=>'Criterios', 'options'=>['maxlength' => '300'] ])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'observaciones', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
   

{{-- @include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'auditorias', 'label'=>'Auditorías', 'data'=>$arrAuditorias, 'options'=>['required']]) --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
  <a href="{!! route('auditorias.programacion') !!}" class="btn btn-default">Cancelar</a>
</div>
