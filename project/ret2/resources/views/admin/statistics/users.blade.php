@section('scripts')
    <script type="text/javascript">
    $(document).ready(function(){
        $("#filtro").change(function(){
            var filtro=$("#filtro").val();
            $.ajax({
              type: "POST",
              url: "{{ URL::to('admin/estadisticas/users') }}",
              data:{
                "filtro":filtro
              },
            }).done(function(data) {
                $("#chart").html(data);
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
          <div id="chart">
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@stop
