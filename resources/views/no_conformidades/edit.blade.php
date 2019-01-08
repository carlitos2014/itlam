@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            No Conformidades
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($noConformidades, ['route' => ['noConformidades.update', $noConformidades->id], 'method' => 'patch']) !!}

                        @include('no_conformidades.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection