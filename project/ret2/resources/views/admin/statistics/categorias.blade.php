@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/newscategory.newscategories") }}}
:: @parent @stop

{{-- Content --}}
@section('main')

@section('scripts')
    <script type="text/javascript">
    $(document).ready(function(){
      $.ajaxSetup(
    {
    	headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	}
    });
        $("#filtro").change(function(){
          var titulo = $("#filtro option:selected").text();
          var filtro=$("#filtro").val();
          $.ajax({
              type: "POST",
              dataType: "json",
              url: "{{ URL::to('admin/estadisticas/categorias') }}",
              data:{
                "filtro":filtro
              },
            }).done(function(data) {
              var dataPoints = [];
              for(key in data){
                dataPoints.push({label: key, y: data[key]});
              }
              var chart = new CanvasJS.Chart("chartContainer", {
                theme: "theme2",//theme1
                axisX:{
                  title: "Categorias",
                },
                title:{
                  text: titulo
                },
                animationEnabled: true,   // change to true
                data: [
                {
                  type: "column",
                  dataPoints: dataPoints
                }
                ]
              });
              chart.render();
            });
          });
    });
    </script>
@endsection


<div class="row">
    <div class="page-header">
        <h2>Estadísticas</h2>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 main">
        <div class="col-xs-4">
          <div class="col-xs-12">
              <a>
                <span class="hidden-sm text">Filtrar</span>
              </a>
              <br>
              <span class="hidden-sm text">Categorías de..</span>
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <select id="filtro" class="categoria" name="categoria">
              <option value="0">Seleccione el filtro...</option>
              <option name="compras" value="1">Productos por numero de compras</option>
              <option name="ventas" value="2">Productos por numero de ventas</option>
            </select>
          </div>
        </div>
        <div class="col-xs-8">
          <div id="chartContainer" style="height: 300px; width: 100%;"></div>
          </div>
        </div>
      </div>
    </div>
</div>
@stop
@section('scripts')
    <script type="text/javascript">
    $(document).ready(function(){
        $("#filtro").change(function(){
            var filtro=$("#filtro").val();
            $.ajax({
              type: "POST",
              url: "{{ URL::to('admin/estadisticas/categorias') }}",
              data:{
                "filtro":filtro
              },
              success:function(data) {
                $("#chart").html(data);
              }
            })
          });
    });
    </script>
@endsection
