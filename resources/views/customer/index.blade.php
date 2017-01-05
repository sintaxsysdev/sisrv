@extends('layouts.app')

@section('content')

    @include('partials.modalQuestion')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register <a href="{{ URL::to('/customer/create') }}">+ Agregar</a></div>
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-condensed" id="customers">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre / Razón Social</th>
                                <th>Ruc / Dni</th>
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
    {{ Html::script('sisrv/js/customer.js') }}
    <script>
        $(document).ready(function () {
            $('#customers').DataTable({
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": '{{ URL::to('/api/customers') }}',
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'customer_businessname', name: 'customer_businessname'},
                    {data: 'customer_ruc_dni', name: 'customer_ruc_dni'},
                    {data: 'customer_phone', name: 'customer_phone'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection
