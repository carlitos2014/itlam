@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Firma
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($firma, ['route' => ['app.firmas.update', $firma->id], 'method'=>'patch', 'files'=>true]) !!}

                        @rinclude('fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection