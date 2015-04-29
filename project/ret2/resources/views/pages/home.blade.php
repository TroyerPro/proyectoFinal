@extends('app')
@section('title') Home :: @parent @stop
@section('content')
<div class="row">
    <div class="page-header">
        <h2>Inicio</h2>
    </div>
    <div class="col-xs-12 navbar-inverse" style="border-radius: 25px;">
      <div class="col-xs-12"style="width:100%;height:20px;"></div>
      <div class="col-xs-12"style="width:100%;height:200px;">
        <div class="col-xs-3" style="height:200px;">
          <img style="border-radius: 100px;height:100%;" class="img-responsive" src="{!!'img/apple.jpg'!!}">
        </div>
        <div class="col-xs-3" style="height:200px;">
          <img style="border-radius: 100px;height:100%;"  class="img-responsive" src="{!!'img/pineapple.jpg'!!}">
        </div>
        <div class="col-xs-3" style="height:200px;">
          <img style="border-radius: 100px;height:100%;" class="img-responsive" src="{!!'img/kiwi.jpg'!!}">
        </div>
        <div class="col-xs-3" style="height:200px;">
          <img style="border-radius: 100px;height:100%;"class="img-responsive" src="{!!'img/orange.jpg'!!}">
        </div>

      </div>
      <div class="col-xs-1"style="height:220px;"></div>
      <div class="col-xs-5"style="height:220px;">
        <div class="col-xs-12"style="width:100%;height:40px;"></div>
        Noticias LOLOLO
      </div>
      <div class="col-xs-6">
        <div class="col-xs-12" style="width:100%;height:40px;"></div>
        <div class="col-xs-12"style="width:100%;height:20px;">
          Top ten
        </div>
        <div class="col-xs-12"style="width:100%;height:20px;">
          produ1
        </div>
        <div class="col-xs-12"style="width:100%;height:20px;">
          produ2
        </div>
        <div class="col-xs-12"style="width:100%;height:20px;">
          produ3
        </div>
        <div class="col-xs-12"style="width:100%;height:20px;">
          produ4
        </div>
        <div class="col-xs-12"style="width:100%;height:20px;">
          produ5
        </div>
        <div class="col-xs-12"style="width:100%;height:20px;">
          produ6
        </div>
        <div class="col-xs-12"style="width:100%;height:20px;">
          produ7
        </div>
        <div class="col-xs-12"style="width:100%;height:20px;">
          produ8
        </div>
        <div class="col-xs-12"style="width:100%;height:20px;">
          produ9
        </div>
        <div class="col-xs-12"style="width:100%;height:20px;">
          produ10
        </div>
        <div class="col-xs-12"style="width:100%;height:20px;">

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
