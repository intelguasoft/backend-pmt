@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Perfiles - {{ $role->name ? $role->name : 'Mostrar' }}</h1>
@stop

@section('content')


@stop