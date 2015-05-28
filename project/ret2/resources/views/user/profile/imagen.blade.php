@extends('user.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/news.news") }}} :: @parent @stop

{{-- Content --}}
@section('main')
<div class="row">
    <div class="page-header">
        <h2>Perfil</h2>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
      @include('errors.list')
          <div class="col-xs-12 main" style="min-height:300px;">
            @yield('main')
						<div class="col-xs-6 form-group">
								<label class=" control-label" >Imagen:</label>
									<img class="profile_img" src="{{ URL::asset('img/profile/'.$currentuser->imagen) }}" style="max-height:250px; max-width:300px;">
						</div>
						<form class="col-xs-6 form-horizontal" id="fupload" enctype="multipart/form-data"
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

											<button type="submit" class="btn btn-sm btn-success">
												<span class="glyphicon glyphicon-ok-circle"></span>
												  Cambiar
											</button>
										</div>
									</div>
									<!-- ./ form actions -->
						</form>
						<a	href="{{ URL::to('user/perfil') }}" class="btn btn-sm btn-warning close_popup">
							<span class="glyphicon glyphicon-ban-circle"></span> Volver
						</a>
        </div>
    </div>
@endsection
@stop
