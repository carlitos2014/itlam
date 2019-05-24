

@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Cargar nuevo archivo
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">

        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'sgsst.store','enctype' => 'multipart/form-data']) !!}

                @include('sgsst.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
<!--'enctype' => 'multipart/form-data'  Permite pasar formularios al controlador-->