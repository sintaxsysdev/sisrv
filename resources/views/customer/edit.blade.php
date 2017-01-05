@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">

                        {!! Form::model($customer, ['route' => ['customer.update', $customer->id], 'method' => 'PUT']) !!}

                            {!! Field::text('customer_ruc_dni') !!}

                            {!! Field::text('customer_businessname') !!}

                            {!! Field::text('customer_phone') !!}

                            {!! Field::text('customer_email') !!}

                            {!! Field::text('customer_address') !!}

                            {!! Field::text('customer_city') !!}

                            {!! Field::textarea('customer_observation') !!}

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Actualizar
                                    </button>
                                </div>
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
