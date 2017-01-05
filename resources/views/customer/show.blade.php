@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register <a href="{{ URL::to('/customer/' . $customer->id . '/edit') }}">+
                            Editar</a></div>
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-condensed">
                            <tr>
                                <td colspan="2">Datos generales : cliente</td>
                            </tr>
                            <tr>
                                <td>Ruc / Dni:</td>
                                <td>{!! $customer->customer_ruc_dni !!}</td>
                            </tr>
                            <tr>
                                <td>Nombre / Razón Social:</td>
                                <td>{!! $customer->customer_businessname !!}</td>
                            </tr>
                            <tr>
                                <td>Teléfono:</td>
                                <td>{!! $customer->customer_phone !!}</td>
                            </tr>
                            <tr>
                                <td>Correo electrónico:</td>
                                <td>{!! $customer->customer_email !!}</td>
                            </tr>
                            <tr>
                                <td>Dirección de su domicilio:</td>
                                <td>{!! $customer->customer_address !!}</td>
                            </tr>
                            <tr>
                                <td>Ciudad:</td>
                                <td>{!! $customer->customer_city !!}</td>
                            </tr>
                            <tr>
                                <td>Observación:</td>
                                <td>{!! $customer->customer_observation !!}</td>
                            </tr>
                            <tr>
                                <td>Creado:</td>
                                <td>{!! $customer->created_at->toFormattedDateString() !!}</td>
                            </tr>
                            <tr>
                                <td>Actualizado:</td>
                                <td>{!! $customer->updated_at->toFormattedDateString() !!}</td>
                            </tr>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
