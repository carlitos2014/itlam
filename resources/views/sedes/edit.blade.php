@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sedes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sedes, ['route' => ['sedes.update', $sedes->id], 'method' => 'patch']) !!}

                        @include('sedes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection