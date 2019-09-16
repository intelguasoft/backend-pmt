@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
    <h1>Perfiles</h1>
    <a href="/admin/perfiles/create" class="btn btn-info float-right"><i class="fa fa-plus"></i> Nuevo perfil</a>
@stop

@section('content')
<table class="table table-condensed table-borderless table-hover">
    <thead class="bg-primary">
        <tr>
            <th class="text-center" width="50px">ID</th>
            <th class="text-center">Perfil</th>
            <th class="text-center">Descripción</th>
            <th class="text-center" width="135px">Acciones</th>
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
                    <a href="{{ route('perfiles.show', ['perfile' => $role->id]) }}" class="btn btn-info"><i class="fa fa-search"></i> </a>
                    <a href="{{ route('perfiles.edit', ['perfile' => $role->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i> </a>
                    <a href="{{ route('perfiles.destroy', ['perfile' => $role->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
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