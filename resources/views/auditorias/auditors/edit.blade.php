@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Auditor
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($auditor, ['route' => ['auditorias.auditors.update', $auditor->id], 'method' => 'patch']) !!}

                        @rinclude('fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection