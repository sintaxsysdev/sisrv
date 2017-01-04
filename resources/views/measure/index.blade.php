@extends('layouts.app')

@section('content')

    @include('measure.modal')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register <a href="{{ URL::to('/measure/create') }}">+ Agregar</a></div>
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-condensed" id="measures">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Unidad de Medida</th>
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
    {{ Html::script('sisrv/js/measure.js') }}
    <script>
        $(document).ready(function () {
            $('#measures').DataTable({
                "order": [[0, "desc"]],
                "processing": true,
                "serverSide": true,
                "ajax": '{{ URL::to('/api/measures') }}',
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'measure_name', name: 'measure_name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection
