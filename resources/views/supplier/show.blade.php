@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register <a href="{{ URL::to('/supplier/' . $supplier->id . '/edit') }}">+
                            Editar</a></div>
                    <div class="panel-body">

                        <table class="table">
                            <tr>
                                <td>Datos generales</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Ruc:</td>
                                <td>{!! $supplier->supplier_ruc !!}</td>
                            </tr>
                            <tr>
                                <td>Nombre / Razón Social:</td>
                                <td>{!! $supplier->supplier_businessname !!}</td>
                            </tr>
                            <tr>
                                <td>Dirección del Domicilio Fiscal</td>
                                <td>{!! $supplier->supplier_legaladdress !!}</td>
                            </tr>
                            <tr>
                                <td>Ciudad</td>
                                <td>{!! $supplier->supplier_city !!}</td>
                            </tr>
                            <tr>
                                <td>Teléfono:</td>
                                <td>{!! $supplier->supplier_phone !!}</td>
                            </tr>
                            <tr>
                                <td>Correo electrónico</td>
                                <td>{!! $supplier->supplier_email !!}</td>
                            </tr>
                            <tr>
                                <td>Observación</td>
                                <td>{!! $supplier->supplier_observation !!}</td>
                            </tr>
                            <tr>
                                <td>Creado:</td>
                                <td>{!! $supplier->created_at->toFormattedDateString() !!}</td>
                            </tr>
                            <tr>
                                <td>Actualizado:</td>
                                <td>{!! $supplier->updated_at->toFormattedDateString() !!}</td>
                            </tr>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
