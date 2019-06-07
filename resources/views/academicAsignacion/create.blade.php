@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Nueva Asignación Académica
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">

        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'asignacion.store','files' => true]) !!}
                @include('academicasignacion.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
<!--'enctype' => 'multipart/form-data'  Permite pasar formularios al controlador-->