@extends('app')
@section('content')
    <div class="row">
            @yield('top')
    </div>
    <div class="row">

        {{--<div class="col-xs-12">--}}
        <div class="col-xs-12 main main_panel">
          @yield('main')
            Form para mostrar estadisticas
        </div>
    </div>
@endsection
