@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">

                        {!! Form::model($supplier, ['route' => ['supplier.update', $supplier->id], 'method' => 'PUT']) !!}

                            {!! Field::text('supplier_ruc') !!}

                            {!! Field::text('supplier_businessname') !!}

                            {!! Field::text('supplier_legaladdress') !!}

                            {!! Field::text('supplier_city') !!}

                            {!! Field::text('supplier_phone') !!}

                            {!! Field::text('supplier_email') !!}

                            {!! Field::textarea('supplier_observation') !!}

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
