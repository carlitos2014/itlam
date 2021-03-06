@extends('layouts.app')

@section('title', '/ Roles Crear')

@section('content')
    <section class="content-header">
        <h1>Nuevo Rol</h1>
    </section>
    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'auth.roles.store']) !!}

                        @rinclude('fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
