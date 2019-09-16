@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Perfiles - <small>Crear nuevo</small></h1>
@stop

@section('content')

<div class="col-md-6 col-md-offset-3">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <!-- <h3 class="text-muted">Los perfiles son los roles a los que puede estar asociado un usuario.</h3> -->
            <h4>Tip! <small>No olvide que la contraseña generada sera enviada al usuario a su correo electronico proporcionado, recuerde cambiarlo cuando sea logueado por primera vez.</small></h4>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="box-body">
                <div class="form-group @error('first_name') has-error @enderror">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="Nombre" aria-describedby="help-name">
                    <!-- <span id="help-name" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                    @error('first_name')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('last_name') has-error @enderror">
                    <label for="name">Apellidos</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Apellidos" aria-describedby="help-name">
                    <!-- <span id="help-name" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                    @error('last_name')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('role_id') has-error @enderror">
                    <label for="name">Perfil</label>
                    <input type="text" class="form-control" name="role_id" id="role_id" value="{{ old('role_id') }}" placeholder="Nombre del perfil" aria-describedby="help-name">
                    <!-- <span id="help-name" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                    @error('role_id')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('description') has-error @enderror">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" name="description" rows="5" placeholder="Descripción del perfil" aria-describedby="help-description">{{ old('description') }}</textarea>
                    <!-- <span id="help-description" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                    @error('description')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group pull-right">
                    <a href="{{ route('perfiles.index') }}" class="btn btn-app">
                        <i class="fa fa-undo"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-app">
                        <i class="far fa-save"></i><br />Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

    @stop