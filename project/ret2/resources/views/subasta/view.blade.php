<div id="background-popup">
</div>
<div id="popup">
  <div class="col-xs-12">
    <div class="close-window">x</div>
    <div class="col-xs-12">
      <div class="col-xs-6"><a href="{{ URL::to('user/pujas/create/'.$subasta->id) }}" class="btn btn-success btn-puja">Realizar puja normal</a></div>
      <div class="col-xs-6"><a href="" class="btn btn-success btn-puja">Configurar una puja automática</a></div>
    </div>
  </div>
</div>
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
               <div class="col-xs-4">
                 <a href="{{ URL::to('search/user/view/'.$user->id) }}">{{ $user->name }}</a>
                </div>

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

               <div class="col-xs-6"><b>Fecha final:</b></div><div class="col-xs-6"> {{$fechaFinal}}</div>
             </div>
             <div class="col-xs-12 ">

               <div class="col-xs-6"><b>Tiempo restante:</b></div><div class="col-xs-6" id="newcountdown"></div>
             </div>
             <div class="col-xs-12">
               <hr width="100%"/>
             </div>
             <div class="col-xs-12">
               @if($subasta->estado_subasta == 1)
               <div class="col-xs-6" id="pujaDesc"><b>Puja actual:</b></div>
                @if($subasta->precio_actual == 0)
                <div class="col-xs-6"><i>Actualmente no hay pujas.</i></div>
                @else
                <div class="col-xs-6">{{ $subasta->precio_actual }} €</div>
                @endif
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
             @if(Auth::check())
               @if($subasta->estado_subasta == 1 && Auth::user()->id != $subasta->id_user_vendedor)
                 <div class="col-xs-12">
                    <button id="pujar" class="iframe btn btn-success btn-mrg-top mrg-left">Realizar una Puja</button>
                 </div>
               @elseif ($subasta->estado_subasta == 1 && Auth::user()->id == $subasta->id_user_vendedor)
                 <div class="col-xs-12">
                    <a href="{{URL::to('user/subastas')}}" class="iframe btn btn-info btn-mrg-top mrg-left">Ir configuración subasta</a>
                 </div>
               @endif
             @endif
           </div>
         </div>
        </div>

    </div>
    @endsection
    @section('scripts')
      @parent
      <script type="text/javascript">
      $(document).ready(function() {

        $('#pujar').click(function() {
            $("#background-popup").css("display", "inline");
            $("#popup").css("display", "inline");
        });

        $('.close-window').click(function() {
            $("#background-popup").css("display", "none");
            $("#popup").css("display", "none");
          });

        $('#background-popup').click(function() {
            $("#background-popup").css("display", "none");
            $("#popup").css("display", "none");
          });

    CountDownTimer('{{$fechaFinal}}', 'newcountdown');

    function CountDownTimer(dt, id)
    {
        var end = new Date(dt);

        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;

        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {

                clearInterval(timer);
                document.getElementById(id).innerHTML = '¡ACABADA!';

                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);

            document.getElementById(id).innerHTML = days + 'días ';
            document.getElementById(id).innerHTML += hours + 'horas ';
            document.getElementById(id).innerHTML += minutes + 'minutos ';
            document.getElementById(id).innerHTML += seconds + 'segundos';
        }

        timer = setInterval(showRemaining, 1000);
    }
      });
      </script>
    @stop
