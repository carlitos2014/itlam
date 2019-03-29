@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Crear nuevo archivo
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">

        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'academicWorkplan.store','enctype' => 'multipart/form-data']) !!}

                @include('academic.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
<!--'enctype' => 'multipart/form-data'  Permite pasar formularios al controlador-->