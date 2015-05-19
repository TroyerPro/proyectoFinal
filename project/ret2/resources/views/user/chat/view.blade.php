@extends('user.layouts.modal') {{-- Content --}} @section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab"> {{
			trans("admin/modal.general") }}</a></li>
</ul>
<!-- ./ tabs -->
{{-- Edit Blog Form --}}

<chat class="col-xs-6" style="overflow-y:scroll; max-height:250px;">
@foreach ($lineas as $lineas)
<div><b> {{$lineas->name}}</b> {{$lineas->created_at}}</div>
 <div>{{$lineas->text}}</div>
@endforeach
</chat>

<escribir class="col-xs-6" >
<input id="texto" type="text"></input>
	<button id="mensaje" class="btn btn-sm">
		<span class="glyphicon glyphicon-ban-circle"></span> {{
		trans("Enviar") }}
	</button>
	<button type="reset" class="btn btn-sm btn-warning close_popup">
		<span class="glyphicon glyphicon-ban-circle"></span> {{
		trans("admin/modal.cancel") }}
	</button>

</escribir>
<script src="{{{ asset('assets/admin/js/jquery-2.1.1.min.js') }}}"></script>
<script src="{{{ asset('assets/admin/js/jquery-ui.1.11.2.min.js') }}}"></script>
<script src="{{{ asset('assets/admin/js/jquery.colorbox.js') }}}"></script>
<script src="{{  asset('assets/admin/js/summernote.js')}}"></script>
<script src="{{  asset('assets/admin/js/select2.js') }}"></script>

<script type="text/javascript">
function scrollTop() {
$("chat").animate({ scrollTop: $(document).height() }, "slow");
	return false;
}
$( document ).ready(function() {

scrollTop();
	$( "#mensaje" ).click(function() {

	var mensaje = 	$( "#texto" ).val();

	var id = {{ $id }};
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
			type : 'POST',
			url : 'ajax/'+id,
			data : {mensaje:mensaje},
	}).success(function() {

		window.location.reload();

			setTimeout(function() {

				}, 10);

	}).fail(function(jqXHR, textStatus, errorThrown) {
							// Optionally alert the user of an error here...
							var textResponse = jqXHR.responseText;
							var alertText = "One of the following conditions is not met:\n\n";
							var jsonResponse = jQuery.parseJSON(textResponse);

							$.each(jsonResponse, function(n, elem) {
									alertText = alertText + elem + "\n";
							});

					});



});


	/*
	$.ajaxSetup(
{
	headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});*/

	var id = {{ $id }};
	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
			type : 'GET',
			url : 'ajax/'+id,
			data : id,
			contentType: false,
			cache: false,
			processData:false
	}).success(function() {
/*
			setTimeout(function() {
				window.location.reload();
				}, 10);
*/
	}).fail(function(jqXHR, textStatus, errorThrown) {
							// Optionally alert the user of an error here...
							var textResponse = jqXHR.responseText;
							var alertText = "One of the following conditions is not met:\n\n";
							var jsonResponse = jQuery.parseJSON(textResponse);

							$.each(jsonResponse, function(n, elem) {
									alertText = alertText + elem + "\n";
							});

							alert(alertText);
					});
});

</script>
@stop
