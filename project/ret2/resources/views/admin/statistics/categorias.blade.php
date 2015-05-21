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
              <span class="hidden-sm text">Categorías de..</span>
            <select id="filtro" class="categoria" name="categoria">
              <option value="0">Seleccione el filtro...</option>
              <option name="compras" value="1">Productos por numero de compras</option>
              <option name="ventas" value="2">Productos por numero de ventas</option>
            </select>
          </div>
        </div>
        <div class="col-xs-8">
          <div id="chart">
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
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
