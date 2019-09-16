@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Perfil - <small>Mostrar detalle</small></h1>
@stop

@section('content')

<div class="col-md-6 col-md-offset-3">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <!-- <h3 class="text-muted">Los perfiles son los roles a los que puede estar asociado un usuario.</h3> -->
            <h4>Tip! <small>Los perfiles son los roles a los que puede estar asociado un usuario.</small></h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group has-success">
                <label for="name">Nombre</label>
                <!-- <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre del perfil" aria-describedby="help-name"> -->
                <label for="name" class="form-control">{{ $role->name }}</label>
            </div>
            <div class="form-group has-success">
                <label for="name">Descripción</label>
                <!-- <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre del perfil" aria-describedby="help-name"> -->
                <label for="name" class="form-control">{{ $role->description }}</label>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group pull-right">
                <a href="{{ route('perfiles.edit', ['perfile' => $role->id]) }}" class="btn btn-warning">
                    <i class="fa fa-edit"></i> Editar
                </a>
                <a href="{{ route('perfiles.destroy', ['perfile' => $role->id]) }}" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Eliminar
                </a>
                <a href="{{ route('perfiles.index') }}" class="btn btn-info">
                    <i class="fa fa-undo"></i> Cancelar
                </a>
            </div>
        </div>
    </div>
    <!-- /.box -->

    @stop