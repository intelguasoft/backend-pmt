@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Departamentos - <small>Listado</small></h1>
<a href="{{ route('departamentos.create') }}" class="btn btn-info  btn-sm pull-right"><i class="fa fa-users-cog"></i> Nuevo departamento</a>
@stop

@section('content')
<table class="table table-condensed table-striped table-bordered table-hover">
    <thead class="bg-primary">
        <tr>
            <th class="text-center" width="50px">ID</th>
            <th class="text-center">Departamento</th>
            <th class="text-center">Código Postal</th>
            <th class="text-center" width="200px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($states as $state)
        <tr>
            <td class="text-right">{{ $state->id }}</td>
            <td>{{ $state->name }}</td>
            <td>{{ $state->postal_code }}</td>
            <td>
                <div class="btn-group">
                    <a href="{{ route('departamentos.show', ['departamento' => $state->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-search"></i> Detalle</a>
                    <a href="{{ route('departamentos.edit', ['departamento' => $state->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>
                    <a href="{{ route('departamentos.destroy', ['departamento' => $state->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">
                <h3>No hay departamentos registrados en el sistema.</h3>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
{{$states->render()}}
@stop