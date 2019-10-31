@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Costos-Peaje - <small>Editar nuevo</small></h1>
@stop

@section('content')

<div class="col-md-6 col-md-offset-3">
    <!-- general form elements -->
    <div class="box box-info">
        <div class="box-header with-border">
            <!-- <h3 class="text-muted">Los perfiles son los roles a los que puede estar asociado un usuario.</h3> -->
            <h4>Tip! <small>Defina los costos para los vehiculos de paso de peaje en las garitas.</small></h4>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">

            <div class="col-md-12 col-sm-12 col-xs-12">

                <label for="type_vehicle_id">Tipo de Vehículo:</label>
                <label for="type_vehicle_id" class="form-control">{{ $costos->type_vehicle->type }}</label>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">

                <label for="cost">Costo: Q.</label>
                <label for="cost" class="form-control">{{ $costos->cost }}</label>

            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">

                <label for="prefix_car_plate">Prefijo:</label>
                <label for="prefix_car_plate" class="form-control">{{ $costos->prefix_car_plate }}</label>

            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <label for="description">Descripción</label>
                <textarea disabled class="form-control" name="description" rows="5" placeholder="Descripción del vehículo" aria-describedby="help-description" readonly>{{ $costos->description }}</textarea>

                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group pull-right">
                        <a href="{{ route('costos-peajes.index') }}" class="btn btn-info">
                            <i class="fa fa-undo"></i> Cancelar
                        </a>
                        <a href="{{ route('costos-peajes.edit', ['costos' => $costos]) }}" class="btn btn-warning">
                            <i class="fa fa-edit"></i>Editar
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.box -->

            @stop