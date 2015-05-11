@extends('user.layouts.modal')
@section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab"> {{
			trans("admin/modal.general") }}</a></li>
</ul>
<!-- ./ tabs -->
{{-- Edit Blog Form --}}
<div class="form-group">
		<label class=" control-label" >Imagen:</label>

			<img class="profile_img" src="{{ URL::asset('img/profile/'.$currentuser->imagen) }}" style="max-height:250px; max-width:300px;">

</div>
<form class="form-horizontal" id="fupload" enctype="multipart/form-data"
	method="post"
	action="{{ URL::to('user/perfil/imagen') }}"
	autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<!-- ./ csrf token -->
	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">
			<div class="tab-pane active" id="tab-general">
				<div
					class="form-group {{{ $errors->has('image') ? 'error' : '' }}}">
					<div class="col-lg-12">
						<label class="control-label" for="image">Nueva imagen: </label> <input name="image"
							type="file" class="uploader" id="image" value="Upload" />
					</div>

				</div>
			</div>

			<div class="form-group">
				<div class="col-md-12">
					<button type="reset" 	src="{{ URL::to('user/perfil') }}" class="btn btn-sm btn-warning close_popup">
						<span class="glyphicon glyphicon-ban-circle"></span> {{
						trans("admin/modal.cancel") }}
					</button>
					<button type="submit" class="btn btn-sm btn-success">
						<span class="glyphicon glyphicon-ok-circle"></span>
						  {{ trans("admin/modal.edit") }}
					</button>
				</div>
			</div>
			<!-- ./ form actions -->

</form>
@stop
