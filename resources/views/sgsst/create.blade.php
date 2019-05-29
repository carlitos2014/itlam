@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Cargar Nuevo Formato
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">

        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'sgsst_s.store','files' => true]) !!}
                @include('sgsst.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
<!--'enctype' => 'multipart/form-data'  Permite pasar formularios al controlador-->