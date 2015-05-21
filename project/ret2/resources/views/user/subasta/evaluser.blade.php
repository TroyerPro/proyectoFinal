@extends('user.layouts.modal')
@section('content')
<div class="row">
    <div class="page-header">
        <h3>Evaluar a <strong>{{ $usuario->name }}</strong></h3>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
      {{--<div class="col-md-8 col-md-offset-2">--}}
        {{--<div class="panel panel-default">--}}
          {{--<div class="panel-heading">Evaluar Ganador</div>--}}
          {{--<div class="panel-body">--}}
          <div class="col-xs-12 main">
            @yield('main')

            <form class="form-horizontal" enctype="multipart/form-data"
            	method="post"
            	action="{{ URL::to('user/rating/'.$subasta->id.'') }}"
            	autocomplete="off">

            	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              <div class="form-group">
                <div class="col-md-12">
                  <label class="control-label" for="title">
                    {{ trans("Nombre del Ganador") }}
                  </label>
                    <input class="form-control" type="text" name="nombre" id="nombre"
                    value="{{ $usuario->name }}" readonly/>
                  <div class="col-md-12">
                <input type="hidden" name="vendedor" value="{{ $vendedor }}"/></div>
                <div class="col-md-12">
                  <label class="control-label" for="title">
                    {{ trans("Puntuación") }}
                  </label>
                  <select class="form-control rating" name="rating">
                    @foreach ($rating as $rating)
                    <option name="{{ $rating->id }}" value="{{ $rating->id }}">{{ $rating->descripcion }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-12">
                  <label class="control-label" for="title">
                    {{ trans("Comentario") }}
                  </label>
                    <input class="form-control" type="text" name="comentario" id="comentario"></input>
                </div>
              </div>

            		<div class="form-group">
            			<div class="col-md-12">
            				<button type="submit" class="btn btn-sm btn-success close_popup">
            					<span class="glyphicon glyphicon-ok"></span> {{
            					trans("Enviar") }}
            				</button>
                    <button class="btn btn-sm btn-danger close_popup">
                      <span class="glyphicon glyphicon-ban-circle"></span> {{
                      trans("Cancelar") }}
                    </button>
            			</div>
            		</div>
            		<!-- ./ form actions -->

            </form>

            {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        </div>
    </div>
@endsection
