@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
    <h1>Usuarios - <small>Lista</small></h1>
    <a href="{{ route('usuarios.create') }}" class="btn btn-info float-right"><i class="fa fa-add-user"></i> Nuevo usuario</a>
@stop

@section('content')
<table class="table table-condensed table-border table-hover">
    <thead class="bg-primary">
        <tr>
            <th class="text-center" width="50px">ID</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">E-mail</th>
            <th class="text-center" width="135px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($usuarios as $usuario)
        <tr>
            <td class="text-right">{{ $usuario->id }}</td>
            <td>{{ $usuario->first_name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>
                <div class="btn-group">
                    <a href="{{ route('usuarios.show', ['usuario' => $usuario->id]) }}" class="btn btn-info"><i class="fa fa-search"></i> </a>
                    <a href="{{ route('usuarios.edit', ['usuario' => $usuario->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i> </a>
                    <a href="{{ route('usuarios.destroy', ['usuario' => $usuario->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
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