@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Multas listado- <small>Pagar</small></h1>
@stop
@section('content')
<div class="row">
    @forelse($multas as $multa)
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading text-right">Vehículo: <strong>{{ $multa->offending_vehicle->car_plate}}</strong></div>
            <div class="panel-body">
                <div class="jumbotron">
                    <p>{{($multa->infringement == null) ? 'No hay informacion referente a esta multa' : $multa->infringement->infringement_summary}}</p>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge">{{$multa->offending_vehicle->mark->name}}</span>
                        Marca:
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{$multa->offending_vehicle->type_vehicle->type}}</span>
                        Tipo de vehículo:
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{$multa->infringement->place}}</span>
                        Area de la infracción:
                    </li>
                    <li class="list-group-item">
                        <span class="badge">{{$multa->infringement->total}}</span>
                        Valor Q:
                    </li>
                </ul>
            </div>
            <div class="panel-footer">
                <a href="{{ route('multas-cobradas.create', ['ballot' => $multa]) }}" class="btn btn-primary btn-block btn btn-danger"><i class="fas fa-shopping-cart"></i> Pagar </a>&nbsp;
            </div>
        </div>
    </div>
    @empty
    <div class="container">
        <div class="alert alert-info text-center" role="alert">
            <h4>No hay multas registradas.</h4>
        </div>
    </div>
    @endforelse
</div>
{{ $multas->render() }}
@stop


@section('js')
<script>
    $(function() {

    });
</script>
@stop

@section('css')
<style>
    div.panel div.panel-body .jumbotron {
        padding: 5px;
        margin-bottom: 2px;
    }
</style>
@stop