@extends('app')
@section('content')
    <div class="row">
            @yield('top')
    </div>
    <div class="row">

        {{--<div class="col-xs-12">--}}
        <div class="col-xs-12 main">
          @yield('main')
         <div class="col-xs-6 under_panel">
           <div class="col-xs-12">
             <img class="imagensubasta" src="{{ URL::asset('img/subasta/'.$subasta->imagen) }}">
           </div>
           <div class="col-xs-12">
             Pujas Totales:
           </div>
           <div class="col-xs-12">
             Pujas Totales:
           </div>
           <div class="col-xs-12">
            Puja actual: {{ $subasta->precio_actual }}
           </div>
         </div>
         <div class="col-xs-6 under_panel">
           <div class="col-xs-12 ">
             <div class="col-xs-12">
               <h2><b>{{ $subasta->nombre }}</b></h2>
             </div>
             <div class="col-xs-12 ">
               <div class="col-xs-5"><b>Usuario vendedor:</b></div> <div_usuario>{{ $user->name }}</div_usuario>
             </div>
             <div class="col-xs-12">
               <div class="col-xs-5"><b>Precio Inicial:</b></div> <div>{{ $subasta->precio_inicial }} € </div>
             </div>
             <div class="col-xs-12">
               <div class="col-xs-5"><b>Estado Subasta:</b></div>
               @if($subasta->estado_subasta == 1)
                <div>Abierta<div>
               @else
                <div>Cerrada<div>
               @endif
             </div>
             <div class="col-xs-12">
               <div class="col-xs-5"><b>Fecha final:</b></div> <div_fecha>{{ $subasta->fecha_final }}<div_fecha>
             </div>
             <div class="col-xs-12">
               <div class="col-xs-5"><b>Rating vendedor:</b></div> <div_rating>{{ $user->ratingvendedor }}</div_raint>
             </div>
             <div class="col-xs-12 ">
               <div class="col-xs-5"><b>Metodo pago:</b></div> <div>{{ $subasta->metodo_pago }}</div>
             </div>
             <div class="col-xs-12 ">
               <div class="col-xs-5"><b>Metodo envio:</b></div> <div>{{ $subasta->metodo_envio }}</div>
             </div>
             <div class="col-xs-12 ">
               <div class="col-xs-6"><b>Descripción del Producto</b></div>
             </div>
             <div class="col-xs-12">
               <div_desc>{{ $subasta->descripcion }}</div_desc>
             </div>
               <div class="col-xs-6 btn-mrg-top">
                 <div class="col-xs-6">
                    <button class="btn btn-default">Pujar</button>
                 </div>
                 <div class="col-xs-6">
                    <button class="btn btn-default">Configurar Puja automática</button>
                 </div>
             </div>
           </div>
         </div>
        </div>
    </div>
@endsection
