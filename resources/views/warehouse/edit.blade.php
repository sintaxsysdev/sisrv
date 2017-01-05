@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">

                        {!! Form::model($warehouse, ['route' => ['warehouse.update', $warehouse->id], 'method' => 'PUT']) !!}

                            {!! Field::text('warehouse_name') !!}

                            {!! Field::textarea('warehouse_description') !!}

                            {!! Field::hidden('warehouse_status', 0) !!}

                            {!! Field::checkbox('warehouse_status') !!}

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
