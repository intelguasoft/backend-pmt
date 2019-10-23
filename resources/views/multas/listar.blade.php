@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Multas - <small>Listado</small></h1>
<a href="{{ route('multas.index') }}" class="btn btn-danger  btn-sm pull-right"><i class="fa fa-file-pdf"></i> Generar reporte</a>
<a href="{{ route('multas.create') }}" class="btn btn-info  btn-sm pull-right"><i class="fa fa-plus"></i> Agregar multa</a>
@stop

@section('content')
<div class="row">
    @forelse($multas as $multa)
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">Vehículo: <strong>P-768BCX</strong></div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge">El Estor</span>
                        Dirección:
                    </li>
                    <li class="list-group-item">
                        <span class="badge">El Estor</span>
                        Dirección:
                    </li>
                    <li class="list-group-item">
                        <span class="badge">El Estor</span>
                        Dirección:
                    </li>
                    <li class="list-group-item">
                        <span class="badge">El Estor</span>
                        Dirección:
                    </li>
                    <li class="list-group-item">
                        <span class="badge">El Estor</span>
                        Dirección:
                    </li>
                </ul>
            </div>
            <div class="panel-footer">
                <a href="{{ route('multas.show') }}" class="btn btn-link"><i class="fas fa-info-circle"></i> Ver más</a>&nbsp;
                <a href="{{ route('multas.print') }}" class="btn btn-link pull-right"><i class="fas fa-print"></i> Imprimir</a>
            </div>
        </div>
    </div>
    @empty
        <div class="container">
            <div class="alert alert-info text-center" role="alert"><h4>No hay multas registradas.</h4></div>
        </div>
    @endforelse
</div>
{{ $multas->render() }}
@stop