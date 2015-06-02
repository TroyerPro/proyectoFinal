@extends('admin.layouts.modal') {{-- Content --}} @section('content')

<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{
			trans("Borrar") }}</a></li>
</ul>
<!-- ./ tabs -->
{{-- Delete Post Form --}}
<form id="deleteForm" class="form-horizontal" method="post"
	action="@if (isset($categorias)){{ URL::to('admin/newscategory/' . $categorias->id . '/delete') }}@endif"
	autocomplete="off">

	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> <input
		type="hidden" name="id" value="{{ $categorias->id }}" />
	<!-- <input type="hidden" name="_method" value="DELETE" /> -->
	<!-- ./ csrf token -->

	<!-- Form Actions -->
	<div class="form-group">
		<div class="controls">
			<br>
			{{ trans("¿Seguro que lo quieres borrar?") }}<br>			<br>
			<element class="btn btn-warning btn-sm close_popup">
			<span class="glyphicon glyphicon-ban-circle"></span> {{
			trans("Cancelar") }}</element>
			<button type="submit" class="btn btn-sm btn-danger">
				<span class="glyphicon glyphicon-trash"></span> {{
				trans("Borrar") }}
			</button>
		</div>
	</div>
	<!-- ./ form actions -->
</form>
@stop
