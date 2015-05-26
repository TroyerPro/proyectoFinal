<div style="visibility:none">{{$hola = true}}</div>
<div id="background-popup">
</div>
<div id="popup">
  <div class="col-xs-12">
    <div class="close-window">x</div>
    <div class="col-xs-12">
      <div class="col-xs-12 text_center">¿Que deseas hacer?</div>
      <div class="col-xs-6"><a href="{{ URL::to('user/pujas/create/'.$subasta->id) }}" class="btn btn-success btn-puja">Realizar puja normal</a></div>
      <div class="col-xs-6"><a href="{{ URL::to('user/pujasAuto/create/'.$subasta->id) }}" class="btn btn-success btn-puja">Configurar una puja automática</a></div>
    </div>
  </div>
</div>
@extends('app')
@section('custom')
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/owl.transitions.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/style.css') }}">
@endsection
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
           <div class=" color_dark fw_medium  col-xs-12">
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
                @if($hola) <span class="puja">{{ $pujas->name }}</span>
                @else
                <span>{{ $pujas->name }}</span>
                @endif

              </div>
              <div class="col-xs-4 ">
                @if($hola) <span class="puja">{{ $pujas->cantidad }}</span>  @else
                  <span>{{ $pujas->cantidad }}</span> @endif
              </div>
              <div class="col-xs-4">
                @if($hola) <span class="puja">{{ $pujas->fecha }}</span>  @else
                  <span>{{ $pujas->fecha }}</span> @endif
              </div>
              {{$hola = false}}
             @endforeach
         </div>
         <div class="col-xs-6 under_panel">
           <div class=" " id="">

    <div class="clearfix">
      <div class="custom_scrollbar">
        <!--left popup column-->
        <!--right popup column-->
        <div class=" half_column">
          <!--description-->
          <h2 class="m_bottom_10"><div href="#" class="color_dark fw_medium">{{ $subasta->nombre }}</div></h2>
          <hr class="m_bottom_10 divider_type_3">
          <table class="description_table m_bottom_10">
            <tr>
              <td  style="font-size:16px">Vendedor:</td>
              <td  style="font-size:16px"><a href="#" class="color_dark"><a href="{{ URL::to('search/user/view/'.$user->id) }}">{{ $user->name }}</a></a></td>
            </tr>
            <tr>
              <td  style="font-size:16px">Ciudad:</td>
              <td  style="font-size:16px">{{ $user->ciudad }}</td>
            </tr>
            <tr>
              <td>R. Vendedor:</td>
                <td>
                  @if($user->ratingvendedor == 0)
                  <i>Este usuario no tiene rating</i>
                  @else
                  <ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover" style="mouse:cursor;">
                  @for ($i = 0; $i < $user->ratingvendedor; $i++)
                  <li><img src="{{ URL::asset('img/star.jpg') }}"></li>
                  @endfor
                </ul>
                  @endif
                </td>
            </tr>
            <tr>
              <td  style="font-size:16px">Estado:</td>
                <td>
                    @if($subasta->estado_subasta == 1)
                      <div  style="font-size:16px"><b>Abierta</b></div>
                     @else
                      <div  style="font-size:16px"><b>Cerrada</b></div>
                     @endif</td>
            </tr>
          </table>
          <hr class="divider_type_3 m_bottom_10">
          <h5 class="fw_medium m_bottom_10">Descripción</h5>
          <p class="m_bottom_10">{{ $subasta->descripcion }}</p>
          <hr class="divider_type_3 m_bottom_15">
          <h2 class="m_bottom_10"><div href="#" class="color_dark fw_medium">
            Tiempo restante
          </div>
          </h2>
          <div class="m_bottom_15">
            <span class="v_align_b f_size_big m_left_5 scheme_color fw_medium"  id="newcountdown"></span>
          </div>
          <div class="m_bottom_15">

            @if($subasta->estado_subasta == 1)
            <b>Puja actual:</b>
             @if($subasta->precio_actual == 0)
             <span><i>Actualmente no hay pujas.</i></span>
             @else
             <span class="v_align_b f_size_big m_left_5 scheme_color fw_medium">{{ $subasta->precio_actual }} €</span>
             @endif
            @else
            <b>Puja Ganadora:</b>
              <span class="v_align_b f_size_big m_left_5 scheme_color fw_medium">{{ $subasta->puja_ganadora }} €</span>
            @endif
          </div>
          <h5 class="fw_medium m_bottom_10">Especificaciones del producto</h5>
          <table class="description_table m_bottom_5">
            <tr>
              <td>Estado:</td>
              <td><span class="color_dark">{{ $subasta->estado }}</span></td>
            </tr>
            <tr>
              <td>Inicio subasta:</td>
              <td><span class="color_dark">{{ $subasta->fecha_inicio }}</span></td>
            </tr>
            <tr>
              <td>Método de pago:</td>
              <td>{{ $subasta->metodo_pago }}</td>
            </tr>
            <tr>
              <td>Método de envio:</td>
              <td>{{ $subasta->metodo_envio }}</td>
            </tr>
          </table>
          @if(Auth::check())
            @if($subasta->estado_subasta == 1 && Auth::user()->id != $subasta->id_user_vendedor)
              <div class="col-xs-12">
                 <button id="pujar" class="iframe btn btn-success btn-mrg-top mrg-left">Realizar una Puja</button>
              </div>
            @elseif ($subasta->estado_subasta == 1 && Auth::user()->id == $subasta->id_user_vendedor)
              <div class="col-xs-12">
                <div class="col-xs-6">
                   <a href="{{URL::to('user/subastas')}}" class="iframe btn btn-info btn-mrg-top mrg-left">Ir configuración subasta</a>
                </div>
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
      <script src="{{asset('assets/site/js/jquery-2.1.0.min.js')}}"></script>
      <script src="{{asset('assets/site/js/jquery-migrate-1.2.1.min.js')}}"></script>

      <script src="{{asset('assets/site/js/waypoints.min.js')}}"></script>
      <script src="{{asset('assets/site/js/jquery.isotope.min.js')}}"></script>

      <script src="{{asset('assets/site/js/scripts.js')}}"></script>
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

            document.getElementById(id).innerHTML = days + 'D ';
            document.getElementById(id).innerHTML += hours + 'h ';
            document.getElementById(id).innerHTML += minutes + 'min ';
            document.getElementById(id).innerHTML += seconds + 'seg';
        }

        timer = setInterval(showRemaining, 1000);
    }
      });
      </script>
    @stop
