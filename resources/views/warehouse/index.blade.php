@extends('layouts.app')

@section('content')

    @include('partials.modalQuestion')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register <a href="{{ URL::to('/warehouse/create') }}">+ Agregar</a></div>
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-condensed" id="warehouses">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Almacén</th>
                                <th>Descripción</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {{ Html::script('sisrv/js/warehouse.js') }}
    <script>
        $(document).ready(function () {
            $('#warehouses').DataTable({
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": '{{ URL::to('/api/warehouses') }}',
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'warehouse_name', name: 'warehouse_name'},
                    {data: 'warehouse_description', name: 'warehouse_description'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection
