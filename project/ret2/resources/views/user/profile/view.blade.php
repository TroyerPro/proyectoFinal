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
            Perfil del propio usuario con todas las opciones para modificar, dar de baja, etc.
        </div>
    </div>
@endsection
