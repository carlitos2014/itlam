@include('widgets.select2')
@include('widgets.datepicker')


@include('widgets.forms.input', ['type'=>'date', 'column'=>4, 'name'=>'fecha', 'label'=>'Fecha y hora', 'options'=>['required']])

@include('widgets.forms.input', ['type'=>'text', 'column'=>8, 'name'=>'lugar', 'label'=>'Lugar', 'options'=>['maxlength' => '50'] ])

@include('widgets.forms.input', ['type'=>'text', 'column'=>4, 'name'=>'objetivos', 'label'=>'Objetivos', 'options'=>['maxlength' => '50'] ])

@include('widgets.forms.input', ['type'=>'text', 'column'=>4, 'name'=>'alcances', 'label'=>'Alcances', 'options'=>['maxlength' => '50'] ])

@include('widgets.forms.input', ['type'=>'text', 'column'=>4, 'name'=>'criterios', 'label'=>'Criterios', 'options'=>['maxlength' => '50'] ])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'observaciones', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])
   

{{-- @include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'auditorias', 'label'=>'Auditorías', 'data'=>$arrAuditorias, 'options'=>['required']]) --}}