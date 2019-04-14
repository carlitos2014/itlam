@extends('layouts.app')

@section('title', '/ Permisos Crear')

@section('content')
    <section class="content-header">
        <h1>Nuevo Permiso</h1>
    </section>
    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'auth.permisos.store']) !!}

                        @rinclude('fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
