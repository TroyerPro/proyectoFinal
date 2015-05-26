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
              url: "{{ URL::to('admin/estadisticas/users') }}",
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
                  title: "Meses",
                },
                title:{
                  text: titulo
                },
                animationEnabled: false,   // change to true
                data: [
                {
                  type: "spline",
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
@extends('admin.layouts.default')
@section('main')
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
              <span class="hidden-sm text">Usuarios por..</span>
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <select id="filtro" class="categoria" name="categoria">
              <option value="0">Seleccione el filtro...</option>
              <option name="zona" value="1">Zona Geográfica</option>
              <option name="compras" value="2">Número de Compras</option>
              <option name="compras" value="3">Número de Ventas</option>
              <option name="compras" value="4">€ Pagados</option>
              <option name="compras" value="5">€ Cobrados</option>
              <option name="compras" value="6">Número de Pujas</option>
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
@endsection
@stop
