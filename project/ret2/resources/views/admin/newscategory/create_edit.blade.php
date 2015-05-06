@extends('admin.layouts.modal') {{-- Content --}} @section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab"> {{
			trans("admin/modal.general") }}</a></li>
</ul>
<!-- ./ tabs -->
{{-- Edit Blog Form --}}
<form class="form-horizontal" enctype="multipart/form-data"
	method="post"
	action="@if(isset($newscategory)){{ URL::to('admin/newscategory/'.$newscategory->id.'/edit') }}
	        @else{{ URL::to('admin/newscategory/create') }}@endif"
	autocomplete="off">
	<!-- CSRF Token -->

	<!-- ./ csrf token -->
	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">
			<div class="tab-pane active" id="tab-general">
				<div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
					<div class="col-md-12">
						<label class="control-label" for="title"> {{
							trans("Nombre") }}</label> <input
							class="form-control" type="text" name="nombre" id="nombre"
							value="{{{ Input::old('nombre', isset($newscategory) ? $newscategory->nombre : null) }}}" />
						{!!$errors->first('title', '<span class="help-block">:message </span>')!!}
					</div>
					<div class="col-md-12">
						<label class="control-label" for="title"> {{
							trans("Descripcion") }}</label> <input
							class="form-control" type="text" name="title" id="title"
							value="{{{ Input::old('descripcion', isset($newscategory) ? $newscategory->descripcion : null) }}}" />
						{!!$errors->first('title', '<span class="help-block">:message </span>')!!}
					</div>
				</div>

			</div>
			<!-- ./ general tab -->
		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->

		<div class="form-group">
			<div class="col-md-12">
				<button type="reset" class="btn btn-sm btn-warning close_popup">
					<span class="glyphicon glyphicon-ban-circle"></span> {{
					trans("admin/modal.cancel") }}
				</button>
				<button type="reset" class="btn btn-sm btn-default">
					<span class="glyphicon glyphicon-remove-circle"></span> {{
					trans("admin/modal.reset") }}
				</button>
				<button type="submit" class="btn btn-sm btn-success">
					<span class="glyphicon glyphicon-ok-circle"></span>
					@if (isset($newscategory))
						{{ trans("admin/modal.edit") }}
					@else
						{{trans("admin/modal.create") }}
				    	@endif
				</button>
			</div>
		</div>
		<!-- ./ form actions -->

</form>
@stop
