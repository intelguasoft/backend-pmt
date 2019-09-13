@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Perfiles</h1>
@stop

@section('content')

<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Perfil</th>
            <th>Descripción</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>100</td>
            <td>Policia de transito</td>
            <td>Todo el control de la carretera...</td>
            <td><a href="#" class="btn btn-warning">Editar</a></td>
            <td><a href="#" class="btn btn-danger">Eliminar</a></td>
        </tr>
        <tr>
            <td>102</td>
            <td>Policia de transito</td>
            <td>Todo el control de la carretera...</td>
            <td><a href="#" class="btn btn-warning">Editar</a></td>
            <td><a href="#" class="btn btn-danger">Eliminar</a></td>
        </tr>
        <tr>
            <td>103</td>
            <td>Policia de transito</td>
            <td>Todo el control de la carretera...</td>
            <td><a href="#" class="btn btn-warning">Editar</a></td>
            <td><a href="#" class="btn btn-danger">Eliminar</a></td>
        </tr>
        <tr>
            <td>104</td>
            <td>Policia de transito</td>
            <td>Todo el control de la carretera...</td>
            <td><a href="#" class="btn btn-warning">Editar</a></td>
            <td><a href="#" class="btn btn-danger">Eliminar</a></td>
        </tr>
        <tr>
            <td>105</td>
            <td>Policia de transito</td>
            <td>Todo el control de la carretera...</td>
            <td><a href="#" class="btn btn-warning">Editar</a></td>
            <td><a href="#" class="btn btn-danger">Eliminar</a></td>
        </tr>
    </tbody>
</table>

@stop