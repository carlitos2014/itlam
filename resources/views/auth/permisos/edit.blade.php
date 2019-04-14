@extends('layouts.app')

@section('title', '/ Permisos Editar')

@section('content')
    <section class="content-header">
        <h1>Actualizar Permiso</h1>
   </section>
   <div class="content">
        @include('flash::message')
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($permiso, ['route' => ['auth.permisos.update', $permiso->id], 'method' => 'patch']) !!}

                        @rinclude('fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection