@extends('app')
@section('content')
    <div class="row">
            @yield('top')
    </div>
    <div class="row">

        {{--<div class="col-xs-12">--}}
        <div class="col-xs-12 main main_panel">
          @yield('main')
            Form para configurar periodo subasta gratuita y precio prorroga
            además de periodo inactividad usuario(PUEDE SER UN POP-UP)
        </div>
    </div>
@endsection
