@push('css')
	{!! Html::style('css/bootstrap/bootstrap-datetimepicker.min.css') !!}
@endpush

@push('js')
	{!! Html::script('js/momentjs/moment-with-locales.min.js') !!}
	{!! Html::script('js/bootstrap/bootstrap-datetimepicker.min.js') !!}
	{!! Html::script('js/bootstrap/bootstrap-datetimepicker-init.js') !!}
@endpush