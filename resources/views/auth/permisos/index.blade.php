@extends('layouts.app')

@section('title', '/ Permisos')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Permisos</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('auth.permisos.create') !!}"><i class="fa fa-plus" aria-hidden="true"></i> Crear Nuevo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @rinclude('index_table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection