@extends('app')
@section('custom')
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/owl.transitions.css') }}">
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('/css/style.css') }}">
@endsection
@section('content')
{{-- Scripts --}}
@section('scripts')
    <script type="text/javascript">
    $(document).ready(function(){

        $("#quitar").click(function(){
          window.location.assign("{{ URL::to('search/subasta') }}")
          });

          $( "#buscar" ).click(function() {
            var nombre=$(".nombre").val();
            var pMax=$(".pMax").val();
            var pMin=$(".pMin").val();
            var idCategoria= $(".categoria").val();
            var metodo= $(".metPago").val();
            var estado= $(".estadoProd").val();
            $.ajax({
              type: "POST",
              url: "{{ URL::to('search/subasta') }}",
              data:{
                "nombre":nombre,
                "pMax":pMax,
                "pMin":pMin,
                "idCategoria": idCategoria,
                "metodo":metodo,
                "estado":estado
              },
              }).done(function() {
                $("#ResultItems").html();
            });
          });

    });
    </script>

@endsection
<div class="page-header">
    <h2>Buscador de Subasta</h2>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="col-xs-12">
      @yield('main')
      <div class="col-xs-3">

        <ul class="nav nav-pills nav-stacked" id="menu">
            <li>
              <form method="post">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <li>
                  <a>
                    <span class="hidden-sm text">Nombre</span>
                  </a>
                </li>
                <input type="text" class="nombre" name="nombre"></input><br>
                <br>
                <li>
                  <a>
                    <span class="hidden-sm text">Precio max.</span>
                  </a>
                </li>
                <input type="text" class="pMax" name="pmax"></input><br>
                <br>
                <li>
                  <a>
                    <span class="hidden-sm text">Precio min.</span>
                  </a>
                </li>
                <input type="text" class="pMin" name="pmin"></input><br>
                <br>
                <li>
                  <a>
                    <span class="hidden-sm text">Categorias</span>
                  </a>
                </li>
                <select class="categoria" name="categoria">
                  <option>Seleccione la categoria</option>
                  @foreach ($categoria as $categoria)
                  <option name="{{ $categoria->id }}" value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                  @endforeach
                </select>
                <br><br>
                <li>
                  <a>
                    <span class="hidden-sm text">Metodo de pago</span>
                  </a>
                </li>
                <select class="metPago" name="metPago">
                  <option>Seleccione el metodo de pago</option>
                  <option>Paypal</option>
                  <option>Tarjeta</option>
                  <option>Efectivo</option>
                </select>
                <br><br>
                <li>
                  <a>
                    <span class="hidden-sm text">Estado producto</span>
                  </a>
                </li>
                <select class="estadoProd" name="estado">
                  <option>Seleccione el estado del producto</option>
                  <option>Nuevo</option>
                  <option>Usado</option>
                  <option>Gastado</option>
                </select><br><br>
                <button type="submit" id="buscar" class="btn btn-sm btn-success">
                  <span class="glyphicon glyphicon-ok-circle"></span>
                    Buscar
                </button>
                <button type="reset" id="quitar" class="btn btn-sm btn-danger">
                  <span class="glyphicon glyphicon-remove-circle"></span>
                   Quitar filtros
                </button>
              </form>
            </li>
        </ul>

      </div>
      <div class="col-xs-9">
        <div id="ResultItems" class="">
          @if (count($subasta) === 0)
            <div class="col-xs-12" style="border-bottom:solid grey 1px;margin-top:2%;">
              <h4>No hay subastas con esos parametros de busqueda</h4>
            </div>
          @else
          <section class="products_container clearfix m_bottom_25 m_sm_bottom_15">
              @foreach ($subasta as $subasta)

              <!--product item-->
              <div class="product_item {{$subasta->id_categoria}}">
                <figure class="r_corners photoframe shadow relative animate_ftb long">
                  <!--product preview-->
                  <a href="#" class="d_block relative pp_wrap">
                    <!--sale product-->
                    <img class="imangen_subasta_home" src="{{ URL::asset('img/subasta/'.$subasta->imagen) }}">
                  </a>
                  <!--description and price of product-->
                  <figcaption>
                    <h5 class="m_bottom_10"><a href="#" class="color_dark">{{$subasta->nombre}}</a></h5>
                    <div class="clearfix">
                      <p class="scheme_color f_left f_size_large m_bottom_15">Puja: @if($subasta->puja_ganadora != 0){{$subasta->puja_ganadora}}@else 0 @endif €</p><br/>
                      <!--rating-->
                    </div>
                    <a class="btn btn-info btn-sm" href="{!! URL::to('/search/subasta/view/'.$subasta->id) !!}">Ir a la subasta</a>

                  </figcaption>
                </figure>
              </div>	<!--product item-->
              @endforeach
            </section>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{asset('assets/site/js/jquery-2.1.0.min.js')}}"></script>
<script src="{{asset('assets/site/js/jquery-migrate-1.2.1.min.js')}}"></script>

<script src="{{asset('assets/site/js/waypoints.min.js')}}"></script>
<script src="{{asset('assets/site/js/jquery.isotope.min.js')}}"></script>

<script src="{{asset('assets/site/js/scripts.js')}}"></script>
@endsection
