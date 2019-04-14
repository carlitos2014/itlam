@extends('layouts.app')

@section('title', '/ Usuarios Editar')

@section('content')
    <section class="content-header">
        <h1>Actualizar usuario</h1>
   </section>
   <div class="content">
        @include('flash::message')
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($usuario, ['route' => ['auth.usuarios.update', $usuario->id], 'method' => 'patch']) !!}

                        @rinclude('fields')
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('auth.usuarios.index') !!}" class="btn btn-default">Cancel</a>
                        </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection