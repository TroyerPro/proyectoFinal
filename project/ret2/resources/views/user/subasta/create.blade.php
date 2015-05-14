@extends('user.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/news.news") }}} :: @parent @stop

{{-- Content --}}
@section('main')
<div class="row">
    <div class="page-header">
        <h3>Creando una subasta</h3>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
      {{--<div class="col-md-8 col-md-offset-2">--}}
        {{--<div class="panel panel-default">--}}
          {{--<div class="panel-heading">Subasta</div>--}}
          {{--<div class="panel-body">--}}
          <div class="col-xs-12 main">
            <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('user/subasta/create') !!}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label">Nombre</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Categoria</label>

                  <div class="col-md-6">
                    <select name="categoria">
                      @foreach ($categoria as $categoria)
                      <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Estado</label>

                  <div class="col-md-6">
                    <select name="estado">
                      <option value="Nuevo">Nuevo</option>
                      <option value="Usado">Usado</option>
                      <option value="Viejo">Viejo</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Descripción producto</label>
                    <div class="col-md-6">
                        <textarea type="text" class="form-control" name="desc" value="{{ old('desc') }}"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Imagen producto</label>

                    <div class="col-md-6">
                      <input name="image" type="file" class="uploader" id="image" value="Upload" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Fecha inicio</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" value="{{$fechaHoy}}" disabled >
                        <input type="hidden" id="fechaIni" class="form-control" name="fechaIni" value="{{$fechaHoy}}" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Duración subasta (días)</label>

                  <div class="col-md-1">
                    <input type="text"  class="form-control" id="duracion" name="duracion"></input>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Fecha final</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control fechaFin" value="" disabled>
                        <input type="hidden" class="form-control fechaFin" name="fechaFin" value="" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Precio inicial</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="precioIni" value="1,00">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Modo de envío</label>

                  <div class="col-md-6">
                    <select name="metodoenvio">
                      <option value="Postal público">Servicio Postal Público</option>
                      <option value="Postal Privado">Servicio Postal Privado</option>
                      <option value="Recoger en persona">Recoger en persona</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Método de pago</label>

                  <div class="col-md-6">
                    <select name="metodo">
                      <option value="Paypal">PayPal</option>
                      <option value="Transf.">Transferencia Bancaria</option>
                      <option value="Metalico">Metálico</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                            Crear Subasta
                        </button>
                    </div>
                </div>
            </form>
            {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        </div>
    </div>
@endsection

{{-- Scripts --}}
@section('scripts')
    @parent

    <script type="text/javascript">
    $( document ).ready(function() {
    	$( "#duracion" ).change(function() {
        var añadirDias = $( "#duracion" ).val();
        var fechaInicio = $( "#fechaIni" ).val();
    	$.ajax({
    		headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
    			type : 'POST',
    			url : 'create/ajax/',
    			data : {añadirDias:añadirDias,
            fechaInicio:fechaInicio
          },
    	}).success(function() {
        alert();

    	}).fail(function(jqXHR, textStatus, errorThrown) {
    							// Optionally alert the user of an error here...
    							var textResponse = jqXHR.responseText;
    							var alertText = "One of the following conditions is not met:\n\n";
    							var jsonResponse = jQuery.parseJSON(textResponse);

    							$.each(jsonResponse, function(n, elem) {
    									alertText = alertText + elem + "\n";
    							});

    							alert(alertText);
    					});



    });


    });

    </script>
@stop
