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
            <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('user/subasta/edit') !!}">
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
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                            Modificar Subasta
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
