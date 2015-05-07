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


<form action="{!! URL::to('user/perfil/imagen') !!}" method="post" enctype="multipart/form-data">
    Select image to upload:
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="file" name="fileToUpload" id="fileToUpload">
		<input type="text" name="a" id="a">
    <input type="submit" value="Upload Image" name="submit">
</form>
@stop
