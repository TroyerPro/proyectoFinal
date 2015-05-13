@extends('app')
@section('title') Home :: @parent @stop


@section('scripts')
  <script src="{{asset('js/jquery.tinycarousel.min.js')}}"></script>
  @parent
  <script>
  $(document).ready(function()
  {
      $('#slider1').tinycarousel(
        {
          interval: true,
      });

      $("#slider5").tinycarousel({
        axis   : "y",
        interval: true,
    });
  });

  </script>
  @endsection

  @section('content')
  <div class="row">
    <div class="page-header">
      <h2>Inicio</h2>
    </div>
    <div class="col-xs-12 navbar-inverse main_panel">
      <div class="col-xs-12 products" >
        <!--CARUSEL -->
        <div id="slider1">
          <a class="buttons prev" href="#">&#60;</a>
          <div class="viewport">
            <ul class="overview">
              @foreach ($bid as $bid)
              <li>
                <a href="search/subasta/view/{{ $bid->id }}">
                  <img src="{{ URL::asset('img/subasta/'.$bid->imagen) }}" alt="" class="main_image"/>
                </a>
              </li>
              @endforeach
            </ul>
          </div>
          <a class="buttons next" href="#">&#62;</a>
        </div>
      </div>


      <div class="col-xs-3">
        <div class="col-xs-12" class="small_row">
          <h2 class="text-center">Categorias</h2>
        </div>

        @foreach ($categoria as $categoria)
        <div class="col-xs-12" class="small_row">
          <a href="search/subasta/filtro/{{ $categoria->id }}">
            {{ $categoria->nombre }}
          </a>
        </div>
        @endforeach
        <div class="col-xs-12" class="small_row"></div>
      </div>
      <div class="col-xs-8" >
        <h2 class="text-center">Noticias</h2>
        <div class="col-xs-4" id="slider5">
            <div class="viewport">
              <ul class="overview">
                @foreach ($bid2 as $bid2)
                <li>
                  <a class="red" href="search/subasta/view/{{ $bid2->id }}">
                    <img src="{{ URL::asset('img/subasta/'.$bid2->imagen) }}" alt="" class="main_image"/>
                  </a>
                </li>
                @endforeach
              </ul>
            </div>
        </div>
        <div class="col-xs-4">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit,
          sed do eiusmod tempor incididunt...
        </div>
        <div class="col-xs-4">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit,
          sed do eiusmod tempor incididunt...
        </div>
      </div>
      </div>
  </div>

@endsection


@stop
