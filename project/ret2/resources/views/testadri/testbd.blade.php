@extends('app') {{-- Web site Title --}}
@section('title') {{{ $cat->nombre }}} :: @parent @stop

@section('meta_author')
<meta name="author" content="{{ $cat->nombre }}" />
@stop {{-- Content --}} @section('content')
<h2>id: {{ $cat->id }}</h2>
<h3>nombre: {{ $cat->nombre }}</h3>
<p>descripcion: {!! $cat->descripcion !!}</p>
<p>creado: {!! $cat->created_at !!}</p>
<p>modificado: {!! $cat->updated_at !!}</p>

@stop
