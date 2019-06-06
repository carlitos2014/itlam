@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Formatos SGSST
        </h1>
   </section>

   <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">

                   {!! Form::model($sgsst, ['route' => ['sgsst_s.update', $sgsst->id], 'method' => 'patch', 'files'=>true]) !!}

                        @include('sgsst.fields')
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection