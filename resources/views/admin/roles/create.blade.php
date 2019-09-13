@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Perfiles - Crear nuevo</h1>
@stop

@section('content')

<form action="{{ route('perfiles.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="row"></div>
    <div class="col-md-6 offset-3">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Descripción</label>
            <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary pull-right"> Guardar </button>
    </div>
    </div>
</form>

@stop