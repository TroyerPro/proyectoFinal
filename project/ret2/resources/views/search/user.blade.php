@extends('app')
@section('title') Contact :: @parent @stop
@section('content')
<div class="page-header">
    <h2>Buscador de Usuarios</h2>
</div>
<div id="ResultItems" class="">
  <ul id="ListView">
    @foreach ($user as $user)
      <li id='{{ $user->id }}'>
        <div class="">
          <a href="#">imagen del user</a>
        </div>
        <h3>{{ $user->name }}</h3>
      </li>
    @endforeach
  </ul>
</div>

@stop
