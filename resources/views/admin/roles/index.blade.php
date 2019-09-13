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
        <tr>
            <td class="text-right">100</td>
            <td>Policia de transito</td>
            <td>Todo el control de la carretera...</td>
            <td><a href="#" class="btn btn-info btn-xs">Usuarios</a> <a href="#" class="btn btn-warning btn-xs">Editar</a> <a href="#" class="btn btn-danger btn-xs">Eliminar</a></td>
        </tr>
        <tr>
            <td class="text-right">102</td>
            <td>Policia de transito</td>
            <td>Todo el control de la carretera...</td>
            <td><a href="#" class="btn btn-info btn-xs">Usuarios</a> <a href="#" class="btn btn-warning btn-xs">Editar</a> <a href="#" class="btn btn-danger btn-xs">Eliminar</a></td>
        </tr>
        <tr>
            <td class="text-right">103</td>
            <td>Policia de transito</td>
            <td>Todo el control de la carretera...</td>
            <td><a href="#" class="btn btn-info btn-xs">Usuarios</a> <a href="#" class="btn btn-warning btn-xs">Editar</a> <a href="#" class="btn btn-danger btn-xs">Eliminar</a></td>
        </tr>
        <tr>
            <td class="text-right">104</td>
            <td>Policia de transito</td>
            <td>Todo el control de la carretera...</td>
            <td><a href="#" class="btn btn-info btn-xs">Usuarios</a> <a href="#" class="btn btn-warning btn-xs">Editar</a> <a href="#" class="btn btn-danger btn-xs">Eliminar</a></td>
        </tr>
        <tr>
            <td class="text-right">105</td>
            <td>Policia de transito</td>
            <td>Todo el control de la carretera...</td>
            <td><a href="#" class="btn btn-info btn-xs">Usuarios</a> <a href="#" class="btn btn-warning btn-xs">Editar</a> <a href="#" class="btn btn-danger btn-xs">Eliminar</a></td>
        </tr>
    </tbody>
</table>

@stop btn-xs