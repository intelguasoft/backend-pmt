@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Multas - <small>a Decomisar</small></h1>
@stop

@section('content')
<div class="row">
    @forelse($multas as $multa)
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading text-right">Vehículo: <strong>{{ $multa->offending_vehicle->car_plate}}</strong></div>
            <div class="panel-body cuerpo-marca">
                <div class="background">
                    <p id="bg-text">Orden de <br />Decomiso</p>
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
            <div class="panel-footer">
                <a href="{{ route('multas.seizureshow', ['ballot' => $multa]) }}" class="btn btn-info btn-xs"><i class="fas fa-info-circle"></i> Ver más</a>&nbsp;
                <a href="{{ route('multas.print', ['ballot' => $multa]) }}" class="btn btn-success pull-right btn-xs"><i class="fas fa-print"></i> Imprimir</a>
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
        padding-left: 30px;
    }

    .cuerpo-marca {
        position: relative;
        z-index: 1;
    }

    #bg-text {
        color: rgba(255, 51, 51, 0.4);
        font-size: 50px;
        transform: rotate(300deg);
        -webkit-transform: rotate(300deg);
    }
</style>
@stop