@extends('app')
@section('title') Contact :: @parent @stop
@section('content')
{{-- Scripts --}}
@section('scripts')
    <script type="text/javascript">
    $(document).ready(function(){


      $("#quitar").click(function(){
        alert("hola");
        window.location.href ="{{ URL::to('search/subasta') }}";
        });


      //  window.location.href ="search/subasta";
    });
      var consulta=[];

      //comprobamos si se pulsa una tecla
    /*  $("#buscar").click(function(e){

            //obtenemos el texto introducido en el campo de búsqueda
            consulta = $("#busqueda").val();

            //hace la búsqueda

            $.ajax({
                  type: "POST",
                  url: "buscar.php",
                  data: "b="+consulta,
                  dataType: "html",
                  beforeSend: function(){
                        //imagen de carga
                        $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                  },
                  error: function(){
                        alert("error petición ajax");
                  },
                  success: function(data){
                        $("#resultado").empty();
                        $("#resultado").append(data);

                  }
            });


      });*/

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
              <form method="POST" action="{{ URL::to('search/subasta') }}">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <li>
                  <a>
                    <span class="hidden-sm text">Nombre</span>
                  </a>
                </li>
                <input type="text" name="nombre"></input><br>
                <br>
                <li>
                  <a>
                    <span class="hidden-sm text">Precio max.</span>
                  </a>
                </li>
                <input type="text" name="pmax"></input><br>
                <br>
                <li>
                  <a>
                    <span class="hidden-sm text">Precio min.</span>
                  </a>
                </li>
                <input type="text" name="pmin"></input><br>
                <br>
                <li>
                  <a>
                    <span class="hidden-sm text">Categorias</span>
                  </a>
                </li>
                <select class="" name="categoria">
                  <option>Seleccione la categoria</option>
                  @foreach ($categoria as $categoria)
                  <option>{{ $categoria->nombre }}</option>
                  @endforeach
                </select>
                <br><br>
                <li>
                  <a>
                    <span class="hidden-sm text">Metodo de pago</span>
                  </a>
                </li>
                <select name="pago">
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
                <select name="estado">
                  <option>Seleccione el estado del producto</option>
                  <option>Nuevo</option>
                  <option>Usado</option>
                  <option>Viejos</option>
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
            @foreach ($bid as $bid)
            <div class="col-xs-12" style="border-bottom:solid grey 1px;margin-top:2%;">
                <div class="col-xs-5">
                  <a href="subasta/view/{{ $bid->id }}"><img class="imagensubasta" src="{{ URL::asset('img/subasta/'.$bid->imagen) }}"></a>
                </div>
                <div class="col-xs-7">
                  <h4>{{ $bid->nombre }}</h4>
                  <div_precio class="col-xs-12">
                    {{ $bid->precio_inicial }}€
                  </div_precio>
                  <div_ptotales class="col-xs-12">
                    Pujas totales:
                  </div_ptotales>
                  <div_fecha class="col-xs-12">
                    {{ $bid->fecha_final }}
                  </div_fecha>
                </div>
            </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
