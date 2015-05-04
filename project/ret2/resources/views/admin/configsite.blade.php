@extends('app')
@section('content')
<div class="row">
    <div class="page-header">
        <h2>Configuración Página</h2>
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
            <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('/auth/login') !!}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label">Periodo Subasta Gratuita</label>

                    <div class="col-md-6">
                      <select name="select_periodo_subasta">
                        <option value="1">3 Días</option>
                        <option value="2">5 Días</option>
                        <option value="3">1 Semana</option>
                        <option value="4">2 Semanas</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Precio Prórroga</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="prorroga" value="{{ old('prorroga') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Periodo Inactividad</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="inactividad" value="{{ old('inactividad') }}">
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
