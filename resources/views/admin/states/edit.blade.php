@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Departamentos - <small>Editar</small></h1>
@stop

@section('content')

<div class="col-md-6 col-md-offset-3">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <!-- <h3 class="text-muted">Los departamentos son los roles a los que puede estar asociado un usuario.</h3> -->
            <!-- <h4>Tip! <small>Los departamentos son los roles a los que puede estar asociado un usuario.</small></h4> -->
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('departamentos.update', ['departamento' => $departamento->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="form-group @error('name') has-error @enderror">
                    <label for="name">Departamento</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $departamento->name) }}" placeholder="Departamento" aria-describedby="help-name">
                    <!-- <span id="help-name" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                    @error('name')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('postal_code') has-error @enderror">
                    <label for="postal_code">Código Postal</label>
                    <input type="text" class="form-control" name="postal_code" id="postal_code" value="{{ old('postal_code', $departamento->postal_code) }}" placeholder="Código Postal" aria-describedby="help-postal_code">
                    <!-- <span id="help-postal_code" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                    @error('postal_code')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('cedula_code') has-error @enderror">
                    <label for="cedula_code">Código Cédula</label>
                    <input type="text" class="form-control" name="cedula_code" id="cedula_code" value="{{ old('cedula_code', $departamento->cedula_code) }}" placeholder="Código de Cédula" aria-describedby="help-cedula_code">
                    <!-- <span id="help-cedula_code" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                    @error('cedula_code')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group pull-right">
                    <a href="{{ route('departamentos.index') }}" class="btn btn-app">
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