@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Multas - <small>Anuladas</small></h1>
<!-- <a href="{{ route('multas.index') }}" class="btn btn-danger  btn-sm pull-right"><i class="fa fa-file-pdf"></i> Generar reporte</a>
<a href="{{ route('multas.create') }}" class="btn btn-info  btn-sm pull-right"><i class="fa fa-plus"></i> Agregar multa</a> -->
@stop

@section('content')
<div class="row">
    @forelse($multas as $multa)
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading text-right">Vehículo: <strong>{{ $multa->offending_vehicle->car_plate}}</strong></div>
            <div class="panel-body cuerpo-marca">
                <div class="background">
                    <p id="bg-text">Anulada</p>
                </div>
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
            <div class="box-body">
                <a href="{{ route('multas.show', ['ballot' => $multa]) }}" class=" btn btn-block btn-info"><i class="fas fa-info-circle"></i> Ver más</a>&nbsp;
            </div>
        </div>
    </div>
    @empty
    <div class="container">
        <div class="alert alert-info text-center" role="alert">
            <h4>No hay multas anuladas registradas.</h4>
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

    .background {
        position: absolute;
        z-index: 9999;
        background: transparent;
        display: block;
        min-height: 50%;
        min-width: 50%;
        color: yellow;
        padding-top: 60px;
    }

    .cuerpo-marca {
        position: relative;
        z-index: 1;
    }

    #bg-text {
        color: red;
        font-size: 70px;
        transform: rotate(300deg);
        -webkit-transform: rotate(300deg);
    }
</style>

@stop