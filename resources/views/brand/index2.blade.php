@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Marca</td>
                                    <td>Editar</td>
                                    <td>Eliminar</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{!! $brand->id !!}</td>
                                    <td>{!! $brand->brand_name !!}</td>
                                    <td>{!! link_to_route('brand.edit', $title = 'Editar', $parameters = [$brand->id], $attributes = ['class' => 'btn btn-primary']) !!}</td>
                                    <td>
                                        {!! Form::open(['route' => ['brand.destroy', $brand->id], 'method' => 'DELETE']) !!}
                                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
