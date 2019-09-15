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
            <h4>Tip! <small>Los perfiles son los roles a los que puede estar asociado un usuario.</small></h4>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('perfiles.store') }}" method="POST">
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre del perfil" aria-describedby="help-name">
                    <!-- <span id="help-name" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" name="description" rows="5" placeholder="Descripción del perfil" aria-describedby="help-description"></textarea>
                    <!-- <span id="help-description" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
    <!-- /.box -->

    @stop