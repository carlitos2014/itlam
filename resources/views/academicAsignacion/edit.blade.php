@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Asignación Académica
        </h1>
   </section>

   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">

                   {!! Form::model($asignacion, ['route' => ['asignacion.update', $asignacion->id], 'method' => 'patch', 'files'=> true]) !!}

                        @include('academicAsignacion.fields')
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection