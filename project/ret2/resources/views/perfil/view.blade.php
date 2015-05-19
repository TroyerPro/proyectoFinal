@extends('app')
@section('content')
    <div class="row">
            @yield('top')
    </div>
    <div class="row">

        {{--<div class="col-xs-12">--}}
        <div class="col-xs-12 main">
          @yield('main')
         <div class="col-xs-12 under_panel">
           <div class="col-xs-6">
             <img class="imagensubasta" src="{{ URL::asset('img/profile/'.$user->imagen) }}">
           </div>
           <div class="col-xs-6">
             <h2>{{$user->name}}</h2>
             <hr width="100%">
             <div class="col-xs-12">
               <span class="glyphicon glyphicon-calendar"></span>{{$user->created_at}}
             </div>

         </div>

        </div>

    </div>
    @endsection
