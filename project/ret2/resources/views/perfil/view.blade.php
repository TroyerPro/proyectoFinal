@extends('app')
@section('content')
    <div class="row">
            @yield('top')
    </div>
    <div class="row">

        {{--<div class="col-xs-12">--}}
        <div class="col-xs-12 main main_panel">
          @yield('main')
         <div class="col-xs-4 under_panel">
           <div class="col-xs-12">
            <h3>{{ $user->username }}</h3>
           </div>
           <div class="col-xs-12">
             <img class="imagensubasta" src="{{ $user->imagen }}">
             ((foto))
           </div>
         </div>
         <div class="col-xs-8 under_panel">
           <div class="col-xs-12 ">
             <div class="col-xs-6">
               <b>Nombre:</b> <div_nombre>{{ $user->name }}</div_nombre>
             </div>
             <div class="col-xs-6">
               <b>Apellidos:</b> <div_apellido>{{ $user->surname }}<div_apellido>
             </div>
             <div class="col-xs-12 ">
               <b>Correo electronico:</b> <div_mail>{{ $user->email }}</div_mail>
             </div>
             <div class="col-xs-6 ">
               <b>Rating como comprador</b>
             </div>
             <div class="col-xs-6 ">
              <b>Rating como vendedor</b>
             </div>
             <div class="col-xs-6 ">
               <div_comprador>estrellitas comprador {{ $user->ratingcomprador }}</div_comprador>
             </div>
             <div class="col-xs-6 ">
               <div_vendedor> estrellitas vendedor {{ $user->ratingvendedor }}</div_vendedor>
             </div>
             <div class="col-xs-12 ">
               <b>Comentario</b>
             </div>
             <div class="col-xs-12 ">
               <div_comentario>{{ $user->comentario }}</div_comentario>
             </div>
           </div>
         </div>
        </div>
    </div>
@endsection
