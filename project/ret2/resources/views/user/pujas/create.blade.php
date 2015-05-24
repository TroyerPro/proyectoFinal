@if($subasta->estado_subasta == 1)

@extends('app')
@section('content')
<div class="row">
    <div class="page-header">
        <h3>Creando una nueva puja</h3>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
      {{--<div class="col-md-8 col-md-offset-2">--}}
        {{--<div class="panel panel-default">--}}
          {{--<div class="panel-heading">Puja</div>--}}
          {{--<div class="panel-body">--}}
          <div class="col-xs-12 main">
            <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('user/pujas/create/'.$subasta->id) !!}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              @if(isset($errorCant))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>Ops!</strong> Parece que hay algunos errores en el formulario:
                    <br><br>
                    <ul>
                       <li>La cantidad de la puja no puede ser menor o igual a la puja actual de la subasta.</li>
                    </ul>
                </div>
              @endif

              @include('errors.list')

                <div class="form-group">
                    <label class="col-md-4 control-label">Estás realizando una puja en la siguiente subasta:</label>

                    <div class="col-md-6">
                        <p class="form-control" name="nombre">{{ $subasta->nombre }}</p>
                    </div>
                </div>

                @if($subasta->precio_actual != 0)
                <div class="form-group">
                    <label class="col-md-4 control-label">Puja actual de la subasta:</label>
                    <div class="col-md-6">
                        <p class="form-control" name="pujaAct" disabled>{{ $subasta->precio_actual }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Cantidad puja:</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="cantidad" value="{{ $subasta->precio_actual +0.01 }}">
                    </div>
                </div>

                @else
                <div class="form-group">
                    <label class="col-md-4 control-label">Precio inicial de la subasta:</label>
                    <div class="col-md-6">
                        <p class="form-control" name="pujaAct">{{ $subasta->precio_inicial }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Cantidad puja:</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="cantidad" value="{{ $subasta->precio_inicial +0.01 }}">
                    </div>
                </div>
                @endif

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                            Crear Puja
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


@else
@endif
