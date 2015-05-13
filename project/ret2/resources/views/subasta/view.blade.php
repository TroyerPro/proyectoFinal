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
             <h3>Historial Pujas</h3>
           </div>
           <table id="table" class="table table-striped table-hover">
               <thead>
               <tr>
                   <th>{{{ trans("Usuario") }}}</th>
                   <th>{{{ trans("Cantidad") }}}</th>
                   <th>{{{ trans("Fecha") }}}</th>
               </tr>
               </thead>
               <tbody></tbody>
           </table>
             @foreach ($pujas as $pujas)
              <div class="col-xs-4">
                {{ $pujas->name }}
              </div>
              <div class="col-xs-4">
                {{ $pujas->cantidad }}
              </div>
              <div class="col-xs-4">
                {{ $pujas->fecha }}
              </div>
             @endforeach
         </div>
         <div class="col-xs-6 under_panel">
           <div class="col-xs-12 ">
             <div class="col-xs-12">
               <div class="col-xs-12"><h3><b>{{ $subasta->nombre }}</b></h3></div>
             </div>
             <div class="col-xs-12 nomRating">
               <div class="col-xs-4">{{ $user->name }}</div>

               <div class="col-xs-8">
                 @if($user->ratingvendedor == 0)
                 <i>Este usuario no tiene rating</i>
                 @else
                 @for ($i = 0; $i < $user->ratingvendedor; $i++)
                 <img src="{{ URL::asset('img/star.jpg') }}">
                 @endfor
                 @endif
               </div>
               <div class="col-xs-12">
                 <div class="col-xs-6">Estado :</div>
                 @if($subasta->estado_subasta == 1)
                  <div class="col-xs-6 green">Abierta</div>
                 @else
                  <div class="col-xs-6 red">Cerrada</div>
                 @endif
               </div>
             </div>
             <div class="col-xs-12">
               <div class="col-xs-6"><b>Precio Inicial:</b></div> <div class="col-xs-6">{{ $subasta->precio_inicial }} € </div>
             </div>
             <div class="col-xs-12">
               <hr width="100%"/>
             </div>
             <div class="col-xs-12 ">
               <div class="col-xs-6"><b>Tiempo restante:</b></div><div class="col-xs-6">00:00:00</div>
             </div>
             <div class="col-xs-12">
               <hr width="100%"/>
             </div>
             <div class="col-xs-12">
               @if($subasta->estado_subasta == 1)
               <div class="col-xs-6" id="pujaDesc"><b>Puja actual:</b></div>
                <div class="col-xs-6">{{ $subasta->precio_actual }} €</div>
               @else
                <div class="col-xs-6" id="pujaDesc"><b>Puja Ganadora:</b></div>
                <div class="col-xs-6">{{ $subasta->puja_ganadora }} €</div>
               @endif
             </div>
             <div class="col-xs-12">
               <hr width="100%"/>
             </div>
             <div class="col-xs-12 ">
               <div class="col-xs-6"><b>Descripción del Producto:</b></div>
             </div>
             <div class="col-xs-12">
               <div class="mrg-top-bot col-xs-12">{{ $subasta->descripcion }}</div>
             </div>
             <div class="col-xs-12 ">
               <div class="col-xs-6"><b>Estado del producto:</b></div> <div class="col-xs-6">{{ $subasta->estado }}</div>
             </div>
             <div class="col-xs-12">
               <hr width="100%"/>
             </div>
             <div class="col-xs-12">
               <div class="col-xs-6"><b>Fecha inicio:</b></div>
               <div class="col-xs-6">{{ $subasta->fecha_inicio }}</div>
             </div>
             <div class="col-xs-12 ">
               <div class="col-xs-6"><b>Metodo pago:</b></div> <div class="col-xs-6">{{ $subasta->metodo_pago }}</div>
             </div>
             <div class="col-xs-12 ">
               <div class="col-xs-6"><b>Metodo envio:</b></div> <div class="col-xs-6">{{ $subasta->metodo_envio }}</div>
             </div>
             @if($subasta->estado_subasta == 1)
               <div class="col-xs-12">
                  <a href="{{{ URL::to('search/subasta/') }}}" class="iframe btn btn-success btn-mrg-top mrg-left">Realizar una Puja</a>
               </div>
             @endif
           </div>
         </div>
        </div>
    </div>
@endsection
