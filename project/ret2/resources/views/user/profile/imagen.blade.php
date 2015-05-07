@extends('user.layouts.modal') {{-- Content --}} @section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab"> {{
			trans("admin/modal.general") }}</a></li>
</ul>
<!-- ./ tabs -->
{{-- Edit Blog Form --}}
<div class="form-group">
		<label class=" control-label" >Imagen:</label>

			<img src="{{ URL::asset('img/profile/'.$currentuser->imagen) }}">

</div>

<form class="form-horizontal" role="form" method="POST" action="{!! URL::to('user/perfil/imagen') !!}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		@if(isset($success))
				<div class="alert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>¡Se han realizado los cambios!</strong>
				</div>
				@endif
		<div class="form-group">
				<label class="col-md-4 control-label" >Tiempo subasta gratuita (días)</label>
				<div class="col-md-6">
						<input type="file" name="imagen">
				</div>
		</div>

		<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
								Realizar cambios
						</button>
				</div>
		</div>
</form>
@stop
