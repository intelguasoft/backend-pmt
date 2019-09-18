@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>users - <small>Mostrar detalle</small></h1>
@stop

@section('content')

<div class="col-md-6 col-md-offset-3">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <!-- <h3 class="text-muted">Los usuarios son los roles a los que puede estar asociado un usuario.</h3> -->
            <!-- <h4>Tip! <small>Los usuarios son los roles a los que puede estar asociado un usuario.</small></h4> -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group has-success">
                <label for="name">Nombre</label>
                <!-- <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre del perfil" aria-describedby="help-name"> -->
                <label for="name" class="form-control">{{ $usuario->first_name }}</label>
            </div>
            <div class="form-group has-success">
                <label for="name">Apellidos</label>
                <!-- <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre del perfil" aria-describedby="help-name"> -->
                <label for="name" class="form-control">{{ $usuario->last_name }}</label>
            </div>
            <div class="form-group has-success">
                <label for="name">Oficial ID</label>
                <!-- <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre del perfil" aria-describedby="help-name"> -->
                <label for="name" class="form-control">{{ $usuario->oficial_id }}</label>
            </div>
            <div class="form-group has-success">
                <label for="name">Perfil</label>
                <!-- <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre del perfil" aria-describedby="help-name"> -->
                <label for="name" class="form-control">{{ $usuario->role_id }}</label>
            </div>
            <div class="form-group has-success">
                <label for="name">Fecha de cumpleaños</label>
                <!-- <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre del perfil" aria-describedby="help-name"> -->
                <label for="name" class="form-control">{{ $usuario->date_birthday }}</label>
            </div>
            <div class="form-group has-success">
                <label for="name">Genero</label>
                <!-- <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre del perfil" aria-describedby="help-name"> -->
                <label for="name" class="form-control">{{ $usuario->gender }}</label>
            </div>
            <div class="form-group has-success">
                <label for="name">NIT</label>
                <!-- <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre del perfil" aria-describedby="help-name"> -->
                <label for="name" class="form-control">{{ $usuario->nit }}</label>
            </div>
            <div class="form-group has-success">
                <label for="name">DPI</label>
                <!-- <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre del perfil" aria-describedby="help-name"> -->
                <label for="name" class="form-control">{{ $usuario->dpi }}</label>
            </div>
            <div class="form-group has-success">
                <label for="name">Nombre completo</label>
                <!-- <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre del perfil" aria-describedby="help-name"> -->
                <label for="name" class="form-control">{{ $usuario->full_name }}</label>
            </div>

            <div class="form-group has-success">
                <label for="name">Correo Electrónico</label>
                <!-- <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre del perfil" aria-describedby="help-name"> -->
                <label for="name" class="form-control">{{ $usuario->email }}</label>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group pull-right">
                <a href="{{ route('usuarios.edit', ['perfile' => $usuario->id]) }}" class="btn btn-warning">
                    <i class="fa fa-edit"></i> Editar
                </a>
                <a href="{{ route('usuarios.destroy', ['perfile' => $usuario->id]) }}" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Eliminar
                </a>
                <a href="{{ route('usuarios.index') }}" class="btn btn-info">
                    <i class="fa fa-undo"></i> Cancelar
                </a>
            </div>
        </div>
    </div>
    <!-- /.box -->

    @stop