@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Costos de Peaje - <small>Listado</small></h1>
<a href="{{ route('costos-peajes.create') }}" class="btn btn-info  btn-sm pull-right"><i class="fa fa-users-cog"></i> Nuevo Vehiculo/Costo</a>
@stop

@section('content')
<table class="table table-condensed table-striped table-bordered table-hover">
    <thead class="bg-primary">
        <tr>
            <th class="text-center" width="50px">ID</th>
            <th class="text-center">Tipo de Vehiculo</th>
            <th class="text-center">Descripcion</th>
            <th class="text-center">Costo</th>
            <th class="text-center">Prefijo de la placa</th>
            <th class="text-center" width="180px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($costospeajes as $costospeaje)
        <tr>
            <td class="text-right">{{ $costospeaje->id }}</td>
            <td>{{ $costospeaje->type_vehicle->type }}</td>
            <td>{{ $costospeaje->description}}</td>
            <td>{{ $costospeaje->cost }}</td>
            <td>{{ $costospeaje->prefix_car_plate }}</td>

            <td>
                <div class="btn-group">
                    <a href="{{ route('costos-peajes.show', ['costos-peajes' => $costospeaje->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-search"></i> Detalle</a>
                    <a href="{{ route('costos-peajes.edit', ['costos-peajes' => $costospeaje->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">
                <h3>No hay perfiles registrados en el sistema.</h3>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
{{$costospeajes->render()}}
@stop