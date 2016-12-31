@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register <a href="{!! URL::to('/brand/create') !!}">+ Agregar</a></div>
                    <div class="panel-body">

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


@endsection
