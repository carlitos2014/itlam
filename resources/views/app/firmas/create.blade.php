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
                    {!! Form::open(['route' => 'app.firmas.store', 'files'=>true]) !!}

                        @rinclude('fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
