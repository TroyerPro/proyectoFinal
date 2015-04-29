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
         <div class="col-xs-6 under_panel">
           <div class="col-xs-12">
             <img class="imagensubasta" src="{!! 'img/iphone.jpg' !!}">
           </div>
           <div class="col-xs-12">
             Pujas:
           </div>
           <div class="col-xs-6">
            Puja actual: 100€
           </div>
           <div class="col-xs-6">
            Usuario: Marta
           </div>
           <div class="col-xs-12">
             Realizar nueva puja
            </div>
            <div class="col-xs-4">
              <button class="btn btn-default">Pujar</button>
            </div>
            <div class="col-xs-4">
              Hora ultima puja: DAY/MONTH/YEAR
            </div>
         </div>
         <div class="col-xs-6 under_panel">
           <div class="col-xs-12 ">
             <div class="col-xs-6">
               Producto: <div_nombre>iPhone</div_nombre>
             </div>
             <div class="col-xs-6">
               Comienzo: <div_fecha>16/04/2015<div_fecha>
             </div>
             <div class="col-xs-6 ">
               Nombre usuario: <div_usuario>Pepito</div_usuario>
             </div>
             <div class="col-xs-6 ">
               Rating usuario: <div_rating>* * *</div_raint>
             </div>
             <div class="col-xs-12 ">
               Descripción de la puja: <div_desc>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</div_desc>
             </div>
           </div>
         </div>
        </div>
    </div>
@endsection
