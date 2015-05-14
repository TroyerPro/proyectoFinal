@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/news.news") }}} :: @parent @stop

{{-- Content --}}
@section('main')
<div class="row">
    <div class="page-header">
        <h2>Configuración subasta</h2>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
      {{--<div class="col-md-8 col-md-offset-2">--}}
        {{--<div class="panel panel-default">--}}
          {{--<div class="panel-heading">Subasta</div>--}}
          {{--<div class="panel-body">--}}
          <div class="col-xs-12 main">
            @yield('main')
            <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('admin/site/config') !!}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if(isset($success))
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>¡Se han realizado los cambios!</strong>
                    </div>
                    @endif
                <div class="form-group">
                    <label class="col-md-4 control-label" >Precio Prórroga (€)</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="prorroga" placeholder="{{ $precio }}" value="{{ $precio }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Tiempo subasta gratuita (días)</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="dias_subasta" placeholder="{{ $dias_subasta }}" value="{{ $dias_subasta }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Periodo Inactividad (días)</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="inactividad" placeholder="{{ $tiempo_inactividad }}" value="{{ $tiempo_inactividad }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                            Realizar cambios
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
@stop
