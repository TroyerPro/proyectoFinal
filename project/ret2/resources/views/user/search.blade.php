@extends('app')
@section('content')
    <div class="row">
            @yield('top')
            Subasta
    </div>
    <div class="row">

        {{--<div class="col-xs-12">--}}
        <div class="col-xs-12 main main_panel">
          @yield('main')
            Formulario resultado busqueda de usuario/s
        </div>
    </div>
@endsection
