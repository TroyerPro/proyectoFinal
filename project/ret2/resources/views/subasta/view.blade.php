@extends('app')
@section('content')
    <div class="row">
            @yield('top')
    </div>
    <div class="row">

        {{--<div class="col-xs-12">--}}
        <div class="col-xs-12 main main_panel">
          @yield('main')
         <div class="col-xs-6 under_panel">
           <div class="col-xs-12">
             <h4>{{ $subasta->nombre }}</h4>
           </div>
           <div class="col-xs-12">
             <img class="imagensubasta" src="{{ $subasta->imagen }}">
             ((foto producto))
           </div>
           <div class="col-xs-12">
             Pujas:
           </div>
           <div class="col-xs-12">
            Puja actual: {{ $subasta->precio_actual }}
           </div>
           <div class="col-xs-12">
              <button class="btn btn-default">Pujar</button>
           </div>
         </div>
         <div class="col-xs-6 under_panel">
           <div class="col-xs-12 ">
             <div class="col-xs-12">
               <b>Fecha final:</b> <div_fecha>{{ $subasta->fecha_final }}<div_fecha>
             </div>
             <div class="col-xs-12 ">
               <b>Usuario vendedor:</b> <div_usuario>{{ $user->name }}</div_usuario>
             </div>
             <div class="col-xs-12">
               <b>Rating del vendedor:</b> <div_rating>{{ $user->ratingvendedor }}</div_raint>
             </div>
             <div class="col-xs-12 ">
               <b>Descripción del Producto</b>
             </div>
             <div class="col-xs-12">
               <div_desc>{{ $subasta->descripcion }}</div_desc>
             </div>
           </div>
         </div>
        </div>
    </div>
@endsection
