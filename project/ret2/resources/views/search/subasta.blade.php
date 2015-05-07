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
            <li {{ (Request::is('admin/dashboard') ? ' class=active' : '') }}>
                <a href="{{URL::to('admin/dashboard')}}"
                        >
                    <i class="fa fa-dashboard fa-fw"></i><span class="hidden-sm text">
        Inicio</span>
                </a>
            </li>

            <li {{ (Request::is('admin/news*') ? ' class=active' : '') }}>
                <a href="#">
                    <i class="glyphicon fa fa-columns"></i> Categorias <span
                            class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li {{ (Request::is('admin/newscategory') ? ' class=active' : '') }} >
                        <a href="{{URL::to('admin/newscategory')}}">
                            <i class="glyphicon glyphicon-list"></i><span
                                    class="hidden-sm text"> Todas </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li {{ (Request::is('admin/photo*') ? ' class=active' : '') }}>
                <a href="#">
                    <i class="glyphicon glyphicon-camera"></i> Photo items<span
                            class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse" id="collapseTwo">
                    <li  {{ (Request::is('admin/photoalbum') ? ' class=active' : '') }} >
                        <a href="{{URL::to('admin/photoalbum')}}">
                            <i class="glyphicon glyphicon-list"></i><span
                                    class="hidden-sm text"> Photo albums</span>
                        </a>
                    </li>
                    <li {{ (Request::is('admin/photo') ? ' class=active' : '') }}>
                        <a href="{{URL::to('admin/photo')}}"
                                >
                            <i class="glyphicon glyphicon-camera"></i><span
                                    class="hidden-sm text"> Photo</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li {{ (Request::is('admin/video*') ? ' class=active' : '') }}>
                <a href="#">
                    <i class="glyphicon glyphicon-facetime-video"></i> Video
                    items<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse" id="collapseThree">
                    <li {{ (Request::is('admin/videoalbum') ? ' class=active' : '') }}>
                        <a href="{{URL::to('admin/videoalbum')}}"
                                >
                            <i class="glyphicon glyphicon-list"></i><span
                                    class="hidden-sm text"> Video albums</span>
                        </a>
                    </li>
                    <li  {{ (Request::is('admin/video') ? ' class=active' : '') }}>
                        <a href="{{URL::to('admin/video')}}"
                                >
                            <i class="glyphicon glyphicon-facetime-video"></i><span
                                    class="hidden-sm text"> Video</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li {{ (Request::is('admin/users*') ? ' class=active' : '') }} >
                <a href="{{URL::to('admin/users')}}"
                        >
                    <i class="glyphicon glyphicon-user"></i><span
                            class="hidden-sm text"> Users</span>
                </a>
            </li>

            <li {{ (Request::is('admin/site*') ? ' class=active' : '') }} >
                <a href="{{URL::to('admin/site/config')}}"
                        >
                    <i class="glyphicon glyphicon glyphicon-cog"></i><span
                            class="hidden-sm text">Conf. Subasta</span>
                </a>
            </li>

        </ul>
        @foreach ($categoria as $categoria)
        <div class="col-xs-12" id="{{ $categoria->id }}" style="border-top:solid grey 1px;margin-top:4%; margin-left:6%;">
          {{ $categoria->nombre }}
        </div>
        @endforeach
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
