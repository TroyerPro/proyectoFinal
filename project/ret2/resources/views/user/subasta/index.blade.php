@extends('user.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("Subastas") }}} @parent @stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {{{ trans("Subastas Activas") }}}
        </h3>
    </div>

    @if(isset($success))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <strong>¡Se ha creado la subasta con éxito!</strong>
        </div>
    @endif

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>{{{ trans("Nombre") }}}</th>
            <th>{{{ trans("Fecha Final") }}}</th>
            <th>{{{ trans("Puja Actual") }}}</th>
            <th>{{{ trans("Estado") }}}</th>
            <th>{{{ trans("Opciones") }}}</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')
    @parent
    <script type="text/javascript">
        var oTable;
        $(document).ready(function () {
            oTable = $('#table').DataTable({
                "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "sPaginationType": "bootstrap",

                "processing": true,
                "serverSide": true,
                "ajax": "{{ URL::to('user/subastas/data/' )}}",
                "fnDrawCallback": function (oSettings) {
                    $(".iframe").colorbox({
                        iframe: true,
                        width: "80%",
                        height: "80%",
                        onClosed: function () {
                            window.location.reload();
                        }
                    });
                }
            });
            var startPosition;
            var endPosition;
            $("#table tbody").sortable({
                cursor: "move",
                start: function (event, ui) {
                    startPosition = ui.item.prevAll().length + 1;
                },
                update: function (event, ui) {
                    endPosition = ui.item.prevAll().length + 1;
                    var navigationList = "";
                    $('#table #row').each(function (i) {
                        navigationList = navigationList + ',' + $(this).val();
                    });
                    $.getJSON("{{ URL::to('user/pujas/reorder') }}", {
                        list: navigationList
                    }, function (data) {
                    });
                }
            });
        });
    </script>
@stop
