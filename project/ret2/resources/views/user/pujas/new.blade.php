@extends('user.layouts.modal') {{-- Content --}} @section('content')
<div class="col-xs-10">
  <div class="col-xs-3">
    <a href="{!! URL::to('user/pujas/create') !!}" class="btn btn-success">Realizar una puja normal</a>
  </div>
  <div class="col-xs-3">
    <a href="" class="btn btn-success">Configurar puja automática</a>
  </div>
</div>
@stop
