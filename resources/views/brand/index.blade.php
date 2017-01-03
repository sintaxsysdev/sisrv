@extends('layouts.app')

@section('content')

    @include('brand.modal')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register <a href="{{ URL::to('/brand/create') }}">+ Agregar</a></div>
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-condensed" id="brand">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Marca</th>
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
    {{ Html::script('sisrv/js/brand.js') }}
    <script>
        $(document).ready(function () {
            $('#brand').DataTable({
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": '{{ URL::to('/api/brands') }}',
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'brand_name', name: 'brand_name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection
