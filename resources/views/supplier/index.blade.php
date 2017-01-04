@extends('layouts.app')

@section('content')

    @include('supplier.modal')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register <a href="{{ URL::to('/supplier/create') }}">+ Agregar</a></div>
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-condensed" id="suppliers">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre / Razón Social</th>
                                <th>Ruc</th>
                                <th>Teléfono</th>
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
    {{ Html::script('sisrv/js/supplier.js') }}
    <script>
        $(document).ready(function () {
            $('#suppliers').DataTable({
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": '{{ URL::to('/api/suppliers') }}',
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'supplier_businessname', name: 'supplier_businessname'},
                    {data: 'supplier_ruc', name: 'supplier_ruc'},
                    {data: 'supplier_phone', name: 'supplier_phone'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection
