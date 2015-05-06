@extends('user.layouts.modal')
@section('content')
<div class="row">
    <div class="page-header">
        <h2>Subasta</h2>
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
                    <label class="col-md-4 control-label">Nombre</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Categoria</label>

                  <div class="col-md-6">
                    <select name="select_categoria">
                      <option value="1">Android</option>
                      <option value="2">Frutas</option>
                      <option value="3">Ventanas</option>
                      <option value="4">Casas</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Estado</label>

                  <div class="col-md-6">
                    <select name="estado">
                      <option value="1">Nuevo</option>
                      <option value="2">Usado</option>
                      <option value="3">Viejo</option>
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
                        <input type="file">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Fecha inicio</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="fechaIni" value="Día y hora de hoy" disabled >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Duración subasta</label>

                  <div class="col-md-6">
                    <select name="duracion">
                      <option value="1">3 días</option>
                      <option value="2">5 días</option>
                      <option value="3">1 semana</option>
                      <option value="4">2 semanas</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Fecha final</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="fechaIni" value="Día y hora de hoy + duracion" disabled >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Método de pago</label>

                  <div class="col-md-6">
                    <select name="duracion">
                      <option value="1">PayPal</option>
                      <option value="2">Transferencia Bancaria</option>
                      <option value="3">Metálico</option>
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
