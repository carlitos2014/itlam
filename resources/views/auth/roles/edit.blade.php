@extends('layouts.app')

@section('title', '/ Roles Editar')

@section('content')
    <section class="content-header">
        <h1>Actualizar Rol</h1>
   </section>
   <div class="content">
        @include('flash::message')
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($rol, ['route' => ['auth.roles.update', $rol->id], 'method' => 'patch']) !!}

                        @rinclude('fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection