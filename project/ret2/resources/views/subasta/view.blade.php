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
             <img class="imagensubasta" src="{{ $subasta->imagen }}">
           </div>
           <div class="col-xs-12">
             Pujas:
           </div>
           <div class="col-xs-6">
            Puja actual: {{ $subasta->precio_actual }}
           </div>
           <div class="col-xs-6">
          <!--  Usuario: {{ $subasta->id_user_vendedor }}(cambiar por name)-->
           </div>
           <div class="col-xs-12">
             Realizar nueva puja
            </div>
            <div class="col-xs-4">
              <button class="btn btn-default">Pujar</button>
            </div>
            <div class="col-xs-4">
              Hora ultima puja: DAY/MONTH/YEAR
              <br/>NOTA: Falta el botón cerrar puja si es el usuario que la ha creado
            </div>
         </div>
         <div class="col-xs-6 under_panel">
           <div class="col-xs-12 ">
             <div class="col-xs-6">
               Producto: <div_nombre>{{ $subasta->nombre }}</div_nombre>
             </div>
             <div class="col-xs-6">
               Acaba: <div_fecha>{{ $subasta->fecha_final }}<div_fecha>
             </div>
             <div class="col-xs-6 ">
               Nombre usuario: <div_usuario>{{ $user->name }}</div_usuario>
             </div>
             <div class="col-xs-6 ">
               Rating como vendedor: <div_rating>{{ $user->ratingvendedor }}</div_raint>
             </div>
             <div class="col-xs-12 ">
               Descripción del Producto: <div_desc>{{ $subasta->descripcion }}</div_desc>
             </div>
           </div>
         </div>
        </div>
    </div>
@endsection
