<!DOCTYPE html>
<!--[if IE 8]> <html lang="es" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="es" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
<html lang="{{ app()->getLocale() }}" class="no-js">
<!--<![endif]-->
    <head>
        <title>{{config('app.name')}} @yield('title')</title>
        {!! Html::meta( null, 'IE=edge', [ 'http-equiv'=>'X-UA-Compatible' ] ) !!}
        {!! Html::meta( null, 'text/html; charset=utf-8', [ 'http-equiv'=>'Content-Type' ] ) !!}

        <!-- Bootstrap 3.3.7 -->
        {!! Html::style('css/bootstrap.min.css') !!}

        <!-- Font Awesome -->
        {!! Html::style('css/font-awesome.min.css') !!}

        <!-- Theme style -->
        {!! Html::style('css/AdminLTE/AdminLTE.min.css') !!}
        {!! Html::style('css/AdminLTE/_all-skins.min.css') !!}

        <!-- iCheck -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">
        @include('widgets.select2')

        <!-- Ionicons -->
        {!! Html::style('css/Ionicons/ionicons.min.css') !!}

        @yield('css')
    </head>


    @yield('body')

</html>