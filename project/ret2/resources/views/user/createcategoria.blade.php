@extends('app')
@section('content')
<div class="row">
    <div class="page-header">
        <h2>Crear categoria</h2>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
      {{--<div class="col-md-8 col-md-offset-2">--}}
        {{--<div class="panel panel-default">--}}
          {{--<div class="panel-heading">Subasta</div>--}}
          {{--<div class="panel-body">--}}
            @if($categoria)
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>¡Nueva categoría creada!</strong>
                    <br><br>
                    <ul>
                      <li>Nombre: {{ $categoria[0] }}</li>
                      <li>Descripción: {{ $categoria[1] }}</li>
                    </ul>
                </div>
            @endif
          <div class="col-xs-12 main">
            @yield('main')
            <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('/admin/crear/categoria') !!}">                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-md-4 control-label">Nombre Categoria</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nomcat" value="{{ old('nomcat') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Descripción producto</label>

                    <div class="col-md-6">
                        <textarea class="form-control" name="desc"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                            Crear nueva categoria
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
