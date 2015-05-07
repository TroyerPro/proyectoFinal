@extends('app')
@section('title') Contact :: @parent @stop
@section('content')
<div class="page-header">
    <h2>Buscador de Subasta</h2>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="col-xs-12">
      @yield('main')
      <div class="col-xs-3">
        <div  class="col-xs-12" id="buscador">
          <div class="input-group">
              <input type="text" class="form-control" placeholder="Buscar...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">
                      <i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </div>

        <ul class="nav nav-pills nav-stacked" id="menu">
            <li>
              <a href="">
                <span class="hidden-sm text">Categorias</span>
              </a>
            </li>
            @foreach ($categoria as $categoria)
            <li>
              <a href="search/subasta/{{ $categoria->nombre }}">
                  <span class="hidden-sm text" style="margin-left:6%;">{{ $categoria->nombre }}</span>
              </a>
            </li>
            @endforeach

        </ul>

      </div>
      <div class="col-xs-9">
        <div id="ResultItems" class="">
          <ul id="ListView">
            @foreach ($bid as $bid)
            <div class="col-xs-12" style="border-bottom:solid grey 1px;margin-top:2%;">
                <div class="col-xs-5">
                  <a href="subasta/view/{{ $bid->id }}">imagen del producto</a>
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
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
