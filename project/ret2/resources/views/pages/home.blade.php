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
        <div class="col-xs-3 last_product">
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
        </div>
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
        $('#myCarousel').carousel({
            interval: 4000
        });
    </script>
@endsection
@stop
