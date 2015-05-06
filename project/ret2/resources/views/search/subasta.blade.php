@extends('app')
@section('title') Contact :: @parent @stop
@section('content')
<div class="page-header">
    <h2>Buscador de Subasta</h2>
</div>
<div id="ResultItems" class="">
  <ul id="ListView">
    @foreach ($bid as $bid)
      <li id='{{ $bid->id }}'>
        <div class="">
          <a href="subasta/view/{{ $bid->id }}">imagen del producto</a>
        </div>
        <h3>{{ $bid->nombre }}</h3>
        <ul>
          <li>{{ $bid->precio_inicial }}€</li>
          <li>num pujas totales</li>
        </ul>
        <ul>
          <li>{{ $bid->fecha_final }}</li>
        </ul>
      </li>
    @endforeach
  </ul>
</div>

@endsection
