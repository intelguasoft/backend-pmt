@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Usuarios - <small>Listado</small></h1>
<a href="{{ route('usuarios.create') }}" class="btn btn-info btn-sm pull-right"><i class="fa fa-user-plus"></i> Nuevo usuario</a>
@stop

@section('content')
<table class="table table-condensed table-striped table-bordered table-hover">
    <thead class="bg-primary">
        <tr>
            <th class="text-center" width="50px">ID</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Fecha de nacimiento</th>
            <th class="text-center">DPI</th>
            <th class="text-center">Genero</th>
            <th class="text-center">E-mail</th>
            <th class="text-center" width="200px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($usuarios as $usuario)
        <tr>
            <td class="text-right">{{ $usuario->id }}</td>
            <td>{{ $usuario->full_name }}</td>
            <td>{{ $usuario->date_birthday }}</td>
            <td>{{ $usuario->dpi }}</td>
            <td>{{ $usuario->gender == 'Male' ? 'Masculino' : 'Femenino'  }}</td>
            <td>{{ $usuario->email }}</td>
            <td>
                <div class="btn-group">
                    <a href="{{ route('usuarios.show', ['usuario' => $usuario->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-search"></i> Detalle</a>
                    <a href="{{ route('usuarios.edit', ['usuario' => $usuario->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>
                    <a href="{{ route('usuarios.destroy', ['usuario' => $usuario->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">
                <h3>No hay usuarios agregados al sistema.</h3>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
{{$usuarios->render()}}
@stop