@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">

                        <ul>
                            @foreach($makes as $make)
                                <li>
                                    -> {{ $make->id }}
                                    -> {{ $make->make_name }}
                                    -> {!! link_to_route('makes.edit', $title = 'Editar', $parameters = $make->id, $attributes = []) !!}
                                    -> {!! Form::open(['route' => ['makes.destroy', $make->id], 'method' => 'DELETE']) !!}
                                    {!! Form::submit('Eliminar', ['class' => '']) !!}
                                    {!! Form::close() !!}
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
