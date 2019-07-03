@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Auditoria Procesos
        </h1>
   </section>
   <div class="content">
       {{-- @include('adminlte-templates::common.errors') --}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($auditoriaProcesos, ['route' => ['auditorias.auditoriaProcesos.update', $auditoriaProcesos->id], 'method' => 'patch']) !!}

                        @include('auditorias.auditoria_procesos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection