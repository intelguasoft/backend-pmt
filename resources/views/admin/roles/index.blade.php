@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Perfiles</h1>
<a href="/admin/perfiles/create" class="btn btn-info pull-right">Nuevo perfil</a>
@stop

@section('content')

<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th class="text-center" width="50px">ID</th>
            <th class="text-center">Perfil</th>
            <th class="text-center">Descripción</th>
            <th class="text-center" width="180px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($roles as $role)
        <tr>
            <td class="text-right">{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->description }}</td>
            <td><a href="{{ route('perfiles.show', $role->id) }}" class="btn btn-info btn-xs">Usuarios</a> <a href="{{ route('perfiles.edit', $role->id) }}" class="btn btn-warning btn-xs">Editar</a> <a href="{{ route('perfiles.destroy', $role->id) }}" class="btn btn-danger btn-xs">Eliminar</a></td>
        </tr>
        @empty
        <tr>
            <td >{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->description }}</td>
            <td><a href="{{ route('perfiles.show', $role->id) }}" class="btn btn-info btn-xs">Usuarios</a> <a href="{{ route('perfiles.edit', $role->id) }}" class="btn btn-warning btn-xs">Editar</a> <a href="{{ route('perfiles.destroy', $role->id) }}" class="btn btn-danger btn-xs">Eliminar</a></td>
        </tr>
        @endforelse
    </tbody>
</table>

@stop btn-xs