<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('cargo', 'Cargo:') !!}
    <p>{!! $firma->cargo !!}</p>
</div>

<!-- image Field -->
<div class="form-group">
    {!! Form::label('filename', 'Firma:') !!}
    <p><img src="{{ asset('storage/firmas/'.$firma->filename) }}" alt="" title="" width="300px"></p>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $firma->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $firma->updated_at !!}</p>
</div>

