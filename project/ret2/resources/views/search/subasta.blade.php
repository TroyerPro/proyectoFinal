@extends('app')
@section('title') Contact :: @parent @stop
@section('content')
{{-- Scripts --}}
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

          $( ".categoria" ).change(function() {
            var idCategoria= $(this).attr( 'name' );
            $.ajax({
              url: "{{ URL::to('search/subasta/ajax/filtro') }}",
              data:{
                "idCategoria": idCategoria
              },
            }).done(function() {


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
              <form method="POST" action="{{ URL::to('search/subasta') }}">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <li>
                  <a>
                    <span class="hidden-sm text">Nombre</span>
                  </a>
                </li>
                <input type="text" name="nombre"></input><br>

                <li>
                  <a>
                    <span class="hidden-sm text">Precio max.</span>
                  </a>
                </li>
                <input type="text" name="pmax"></input><br>
                <li>
                  <a>
                    <span class="hidden-sm text">Precio min.</span>
                  </a>
                </li>
                <input type="text" name="pmin"></input><br>
                <li>
                  <a>
                    <span class="hidden-sm text">Categorias</span>
                  </a>
                </li>
                @foreach ($categoria as $categoria)
                <input type="checkbox" class="categoria" name="{{ $categoria->id }}" value="{{ $categoria->id }}">{{ $categoria->nombre }}</input><br>
                @endforeach
                <li>
                  <a>
                    <span class="hidden-sm text">Tipo de pago</span>
                  </a>
                </li>
                <select name="pago">
                  <option>Paypal</option>
                  <option>Tarjeta</option>
                  <option>Efectivo</option>
                </select>
                <li>
                  <a>
                    <span class="hidden-sm text">Estado producto</span>
                  </a>
                </li>
                <select name="estado">
                  <option>Nuevo</option>
                  <option>Usado</option>
                  <option>Viejos</option>
                </select><br>
                <button type="submit" class="btn btn-sm btn-success">
                  <span class="glyphicon glyphicon-ok-circle"></span>
                    Buscar
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
                  <a href="subasta/view/{{ $bid->id }}"><img class="imagensubasta" src="{{ URL::asset('img/subasta/'.$subasta->imagen) }}"></a>
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
