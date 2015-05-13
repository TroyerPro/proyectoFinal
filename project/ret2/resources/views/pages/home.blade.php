@extends('app')
@section('title') Home :: @parent @stop
@section('content')
<div class="row">
    <div class="page-header">
        <h2>Inicio</h2>
    </div>
    <div class="col-xs-12 navbar-inverse main_panel">
      <div class="col-xs-12 small_row"></div>
      <div class="col-xs-12 products" >

        <div id="basicExample">
          @foreach ($bid as $bid)
          <a href="search/subasta/view/{{ $bid->id }}">
          <img src="{{ URL::asset('img/subasta/'.$bid->imagen) }}" alt="" />
          </a>
          <!--  <a href="path/to/image1.jpg">
                <img alt="caption for image 1" src="{!!'img/orange.jpg'!!}" />
            </a>
            <a href="path/to/image2.jpg">
                <img alt="caption for image 2" src="{!!'img/kiwi.jpg'!!}" />
            </a> -->
            @endforeach
        </div>

      <!--<div id="carousel-productos" class="carousel slide col-xs-12 products" data-ride="carousel">
          <!-- Indicadores -->
          <!--  <ol class="carousel-indicators">
            <li data-target="#carousel-productos" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-productos" data-slide-to="1"></li>
            <li data-target="#carousel-productos" data-slide-to="2"></li>
            <li data-target="#carousel-productos" data-slide-to="3"></li>
          </ol>-->

          <!-- Contenido imágenes -->
          <!--  <div class="carousel-inner last_product" role="listbox">

            <div class="item active last_product main_image">
              <img style="width:100%; height:100%;" src="{!!'img/apple.jpg'!!}" alt="">
              <div class="carousel-caption">
               <h3></h3>
              </div>
            </div>

            <div class="item last_product main_image">
              <img style="width:100%; height:100%;" src="{!!'img/pineapple.jpg'!!}" alt="...">
              <div class="carousel-caption">
               <h3></h3>
                   <p></p>
              </div>

            </div>

            <div class="item last_product main_image">
              <img style="width:100%; height:100%;" src="{!!'img/kiwi.jpg'!!}" alt="...">
              <div class="carousel-caption">
              <h3></h3>
              </div>
            </div>

            <div class="item last_product main_image">
              <img style="width:100%; height:100%;" src="{!!'img/orange.jpg'!!}" alt="...">
              <div class="carousel-caption">
              <h3></h3>
              </div>
            </div>

          </div>-->


           <!-- Controles -->
           <!--  <a class="left carousel-control" href="#carousel-productos" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previo</span>
          </a>
          <a class="right carousel-control" href="#carousel-productos" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
          </a>

      </div>-->

        <!--<div class="col-xs-3 last_product">
          <img class="main_image" src="{!!'img/apple.jpg'!!}">
        </div>
        <div class="col-xs-3 last_product" >
          <img class="main_image" src="{!!'img/pineapple.jpg'!!}">
        </div>
        <div class="col-xs-3 last_product">
          <img class="main_image" src="{!!'img/kiwi.jpg'!!}">
        </div>
        <div class="col-xs-3 last_product">
          <img class="main_image" src="{!!'img/orange.jpg'!!}">
        </div>-->


      </div>

      <div class="col-xs-1 side_space" ></div>
      <div class="col-xs-5 top_space" >
        <div class="col-xs-12 mid_row"></div>
          <h2 class="text-center">Noticias</h2>
        <div class="col-xs-4">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit,
          sed do eiusmod tempor incididunt...
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
      <div class="col-xs-6">
        <div class="col-xs-12 mid_row" ></div>
        <div class="col-xs-12" class="small_row">
          <h2 class="text-center">Top 10 Productos (o categorias)</h2>
        </div>
        <div class="col-xs-12" class="small_row">
          iPhone5
        </div>
        <div class="col-xs-12" class="small_row">
          Android
        </div>
        <div class="col-xs-12" class="small_row">
          produ3
        </div>
        <div class="col-xs-12" class="small_row">
          produ4
        </div>
        <div class="col-xs-12" class="small_row">
          produ5
        </div>
        <div class="col-xs-12" class="small_row">
          produ6
        </div>
        <div class="col-xs-12" class="small_row">
          produ7
        </div>
        <div class="col-xs-12" class="small_row" >
          produ8
        </div>
        <div class="col-xs-12" class="small_row">
          produ9
        </div>
        <div class="col-xs-12" class="small_row">
          produ10
        </div>
        <div class="col-xs-12" class="small_row">
        </div>
      </div>
    </div>

</div>
@endsection

@section('scripts')
    @parent
    <script>

    $('#basicExample').justifiedGallery({
    rowHeight : 100,
    lastRow : 'nojustify',
    margins : 7
    });
        $('#carousel-productos').carousel({
            interval: 3000
        });
    </script>
@endsection
@stop
