@extends('layouts.app')

@section('title', '/ Usuarios Crear')

@section('content')
    <section class="content-header">
        <h1>Nuevo Usuario</h1>
    </section>
    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['url' => 'register']) !!}

                        @rinclude('fields')
                        @include('widgets.forms.input', ['type'=>'password', 'name'=>'password', 'label'=>'Contraseña' ])
                        @include('widgets.forms.input', ['type'=>'password', 'name'=>'password_confirmation', 'label'=>'Confirmar Contraseña' ])
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

