{{-- Scripts --}}
@section('scripts')
    <script type="text/javascript">
    $(document).ready(function(){
      $( "#diasPro" ).change(function() {
        var anadirDias  = $( "#diasPro" ).val();
        var fechaFin = "{{$subasta->fecha_final}}";
        var d = new Date(fechaFin.slice(0,4), fechaFin.slice(5,7), fechaFin.slice(8,10), fechaFin.slice(11,13), fechaFin.slice(14,16), fechaFin.slice(17,19), 00);
        d.setMonth(d.getMonth()-1);
        d.setDate(d.getDate()+parseInt(anadirDias));
        $("#fechaNueva").attr("placeholder", d.toLocaleString());
        $('#fechaNueva').val = d;
      });
      $("#formPro").submit(function() {
        var diasPro = parseInt(document.getElementById('diasPro').value);
        if(!isNaN(diasPro)) {
            var dias = Math.round(diasPro);
            var precioDia = {{ $confProrroga->precio_prorroga }};
            var tot = dias * precioDia;
            $confirmar = confirm("Vas a prorrogar la subasta por "+dias+" días más. El precio de la prorroga es de "
            +precioDia+" € por día. En total, serán "+tot+" €. ¿Deseas continuar?");
            return $confirmar;
        }
      });
    });
    </script>
@endsection
@extends('user.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/news.news") }}} :: @parent @stop

{{-- Content --}}
@section('main')
<div class="row">
    <div class="page-header">
        <h3>Prorrogar subasta</h3>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
      {{--<div class="col-md-8 col-md-offset-2">--}}
        {{--<div class="panel panel-default">--}}
          {{--<div class="panel-heading">Subasta</div>--}}
          {{--<div class="panel-body">--}}
          <div class="col-xs-12 main">
            <form class="form-horizontal"
              method="post"
              action="{{ URL::to('user/subasta/'.$subasta->id.'/prorrogar') }}"
              autocomplete="off" id="formPro">
              @include('errors.list')
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label" for="title"> {{
                    trans("Nombre de la subasta") }}</label> <input
                    class="form-control" type="text" name="nombre" id="nombre"
                    value="{{ $subasta->nombre }}" disabled/>
                      <label class="control-label" for="title"> {{
                        trans("Ultima Puja") }}</label> <input
                        class="form-control" type="text" name="puja" id="puja"
                        value="{{ $subasta->precio_actual }}" disabled/>

                        <label class="control-label" for="title"> {{
                          trans("Precio prorroga") }}</label> <input
                          class="form-control" type="text" name="asd" id="asd"
                          value="{{ $confProrroga->precio_prorroga }} € / día" disabled/>
                          <label class="control-label" for="title"> {{
                            trans("Fecha final antigua") }}</label> <input

                            class="form-control" type="text" name="fechaAntigua" id="fechaAntigua"
                            value="{{ $fechaFinalMolona }}" placeholder="{{ $fechaFinalMolona }}" disabled/>
                          <label class="control-label" for="title"> {{
                            trans("Tiempo prorroga (días)") }}</label> <input
                            class="form-control" type="text" name="diasPro" id="diasPro" value="{{old('diasPro')}}"/>
                            <label class="control-label" for="title"> {{
                              trans("Fecha final nueva") }}</label> <input
                              class="form-control" type="text" name="fechaNueva" id="fechaNueva"
                              value="" disabled/>
                </div>
              </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-sm btn-success close_popup">
                      <span class="glyphicon glyphicon-ok"></span> Pagar
                    </button>

                <!-- ./ form actions -->
            </form>

              <a href="{{{ URL::to('user/subasta/finalizadas') }}}" class="btn btn-sm btn-danger close_popup">
                <span class="glyphicon glyphicon-ban-circle">
                </span> {{ trans("Cancerlar") }}
              </a>
            </div>
          </div>
            {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        </div>
    </div>
@endsection
