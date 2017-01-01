@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register <a href="{!! URL::to('/brand/create') !!}">+ Agregar</a></div>
                    <div class="panel-body">

                        @include('brand.modal')

                        <table class="table" id="brand">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Marca</td>
                                <td>Creado</td>
                                <td>Actualizado</td>
                                <td>Acciones</td>
                            </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function ConfirmDeleteMake(btn) {
            'use strict';
            $("#deleteMake").val(btn.value);
        }

        function ReloadMakeDataTableInPagination(id) {
            'use strict';
            var dataTable = $(id).DataTable();
            dataTable.ajax.reload(null, false);
        }

        function DeleteMake(btn) {
            'use strict';
            var route = "brand/delete/" + btn.value;
            var token = $("#token").val();
            $.ajax({
                url: route,
                success: function () {
                    $("#modalQuestion").modal('toggle');
                    ReloadMakeDataTableInPagination('#brand');
                    toastr.success("¡Marca eliminado correctamente!")
                }
            });
        }
    </script>


@endsection
