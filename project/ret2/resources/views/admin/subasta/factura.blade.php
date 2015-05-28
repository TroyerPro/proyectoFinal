@extends('admin.layouts.modal')
@section('content')
<div class="row">
    <div class="page-header">
        <h2>Factura</h2>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
      {{--<div class="col-md-8 col-md-offset-2">--}}
        {{--<div class="panel panel-default">--}}
          {{--<div class="panel-heading">Factura</div>--}}
          {{--<div class="panel-body">--}}
          <div class="col-xs-12 main">
            @yield('main')
            <p>Generando factura de la siguiente Subasta: </p>
            <form class="form-horizontal" enctype="multipart/form-data"
            	method="post"
            	action="{{ URL::to('user/subasta/'.$subasta->id.'/cerrar') }}"
            	autocomplete="off">

            	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              <input type="hidden" name="id" id="id" value="{{{ $subasta->id }}}" />
              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label" for="title"> {{
                    trans("Nombre") }}</label> <input
                    class="form-control" type="text" name="nombre" id="nombre"
                    value="{{ $subasta->nombre }}" disabled/>
                    <label class="control-label" for="title"> {{
                      trans("Descripcion") }}</label> <input
                      class="form-control" type="textarea" name="descripcion" id="descripcion"
                      value="{{ $subasta->descripcion }}" disabled/>
                      <label class="control-label" for="title"> {{
                        trans("Ultima Puja") }}</label> <input
                        class="form-control" type="text" name="puja" id="puja"
                        value="{{ $subasta->precio_actual }}" disabled/>
                </div>
              </div>
            		<!-- ./ form actions -->

            </form>

                <div class="col-md-12">
                <button id ="pdf" class="btn btn-sm btn-succes ">
                  <span class="glyphicon glyphicon-ban-circle"></span> {{
                  trans("PDF") }}
                </button>
                <a id="apdfDownload" href="#" download><button type="button" id="pdfDownload" class="btn btn-sm btn-succes " style="display: none;">
                  <span class="glyphicon glyphicon-ban-circle"></span>
                      {{trans("Descargar PDF") }}
                </button></a>
                <button id="xml" class="btn btn-sm btn-succes " >
                  <span class="glyphicon glyphicon-ban-circle"></span> {{
                  trans("XML") }}
                </button>
                <a id="axmlDownload" href="#" download><button type="button" id="xmlDownload" class="btn btn-sm btn-succes " style="display: none;">
                  <span class="glyphicon glyphicon-ban-circle"></span>
                      {{trans("Descargar XML") }}
                </button></a>

              </div>


            {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        </div>
    </div>
@endsection

@section('scripts')
<script>

$("#xml").click(function(){

  var id = $("#id").val();

  $.ajaxSetup(
{
	headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

  $.ajax({
    url: "xml",
    data: {id :id },
    method : "POST" ,
    success: function(result){
      console.log(result);
      $('#axmlDownload').attr('href', result);
      $('#xmlDownload').show();
      $('#xml').hide();

    }
  });
});

$("#pdf").click(function(){

  var id = $("#id").val();

  $.ajaxSetup(
{
	headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

  $.ajax({
    url: "pdf",
    data: {id :id },
    method : "POST" ,
    success: function(result){
      console.log(result);
      $('#apdfDownload').attr('href', result);
      $('#pdfDownload').show();
      $('#pdf').hide();

    }
  });
});




</script>
@endsection
@stop
