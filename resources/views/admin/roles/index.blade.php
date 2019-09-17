@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
    <h1>Perfiles - <small>Listado</small></h1>
    <a href="{{ route('perfiles.create') }}" class="btn btn-info  btn-sm pull-right"><i class="fa fa-users-cog"></i> Nuevo perfil</a>
@stop

@section('content')
<table class="table table-condensed table-striped table-bordered table-hover">
    <thead class="bg-primary">
        <tr>
            <th class="text-center" width="50px">ID</th>
            <th class="text-center">Perfil</th>
            <th class="text-center">Descripción</th>
            <th class="text-center" width="200px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($roles as $role)
        <tr>
            <td class="text-right">{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->description }}</td>
            <td>
                <div class="btn-group">
                    <a href="{{ route('perfiles.show', ['perfile' => $role->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-search"></i> Detalle</a>
                    <a href="{{ route('perfiles.edit', ['perfile' => $role->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>
                    <a href="{{ route('perfiles.destroy', ['perfile' => $role->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a>
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
{{$roles->render()}}
@stop