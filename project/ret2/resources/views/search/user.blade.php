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
          window.location.assign("{{ URL::to('search/user') }}")
          });

          $( "#buscar" ).click(function() {
            var nombre=$(".nombre").val();
            $.ajax({
              type: "POST",
              url: "{{ URL::to('search/user') }}",
              data:{
                "nombre":nombre,
              },
              }).done(function() {
                $("#ResultItems").html();
            });
          });

          var nombre=new Array();
          var cont=0;
          @foreach ($user as $user)
            nombre[cont]='{{$user->name}}';
            cont+=1;
          @endforeach
          $(function() {
              $("input").autocomplete({
                source:[nombre]
              });
          });

  });
    </script>

@endsection

<div class="page-header col-xs-12">
    <h2>Buscador de Usuarios</h2>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="col-xs-12">
      @yield('main')
        <div  class="col-xs-3" id="buscador">
          <div class="input-group">
            <ul class="nav nav-pills nav-stacked" id="menu">
              <li>
                <form method="post">
                  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                  <li>
                    <a>
                      <span class="hidden-sm text" id="nombre">Nombre</span>
                    </a>
                  </li>
                  <input type="text" class="form-group nombre" name="nombre"></input><br>
                  <br>
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
        </div>
      <div class="col-xs-9">
        @if (count($user2) === 0)
          <div class="col-xs-12" style="border-bottom:solid grey 1px;margin-top:2%;">
            <h4>No hay usuarios con ese nombre</h4>
          </div>
        @else

        <section class="products_container clearfix m_bottom_25 m_sm_bottom_15" style="width:1">
            @foreach ($user2 as $user2)

            <!--product item-->
            <div class="product_item">
              <figure class="r_corners photoframe shadow relative animate_ftb long">
                <!--product preview-->
                <a href="{!! URL::to('/search/user/view/'.$user2->id) !!}" class="d_block relative pp_wrap">
                  <!--sale product-->
                  <img class="imangen_profile" src="{{ URL::asset('img/profile/'.$user2->imagen) }}">
                </a>
                <!--description and price of product-->
                <figcaption>
                  <h5 class="m_bottom_10"><a href="#" class="color_dark">{{ $user2->name }}</a></h5>
                  <div class="clearfix">
                  </div>

                </figcaption>
              </figure>
            </div>

            @endforeach
          </section>
          @endif
    </div>
  </div>
</div>

<script src="{{asset('assets/site/js/jquery-2.1.0.min.js')}}"></script>
<script src="{{asset('assets/site/js/jquery-migrate-1.2.1.min.js')}}"></script>

<script src="{{asset('assets/site/js/waypoints.min.js')}}"></script>
<script src="{{asset('assets/site/js/jquery.isotope.min.js')}}"></script>

<script src="{{asset('assets/site/js/scripts.js')}}"></script>


@endsection
