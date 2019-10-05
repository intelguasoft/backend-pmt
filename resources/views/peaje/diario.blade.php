@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Peaje - <small>Cobro diario</small></h1>
<a href="{{ route('peaje.generate.diario') }}" class="btn btn-danger  btn-sm pull-right"><i class="fa fa-file-pdf"></i>&NonBreakingSpace; Generar reporte</a>
@stop

@section('content')
<table class="table table-condensed table-striped table-bordered table-hover">
    <thead class="bg-primary">
        <tr>
            <th class="text-center" width="50px">ID</th>
            <th class="text-center">Fecha</th>
            <th class="text-center">Hora</th>
            <th class="text-center">Tipo vehículo</th>
            <th class="text-center">Placa</th>
            <th class="text-center">Costo</th>
        </tr>
    </thead>
    <tbody>
        @forelse($peajes as $peaje)
        <tr>
            <td class="text-right">{{ $peaje->id }}</td>
            <td class="text-right">{{ $peaje->date }}</td>
            <td class="text-right">{{ $peaje->time }}</td>
            <td>{{ $peaje->type_toll_vehicle->type }}</td>
            <td class="text-right">{{ $peaje->type_toll_vehicle->prefix_car_plate }}{{ $peaje->car_plate }}</td>
            <td class="text-right">Q. {{ number_format($peaje->type_toll_vehicle->cost, 2) }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6">
                <h3>No hay cobros de peaje registrados en la fecha actual.</h3>
            </td>
        </tr>
        @endforelse
    </tbody>
    @if(!count($peajes) == 0)
    <tfoot>
        <tr>
            <th class="text-right" colspan="5">Cobro del dia: </th>
            <th class="text-right">Q. {{ number_format($total_dia, 2) }}</th>
        </tr>
    </tfoot>
    @endif
</table>
{{$peajes->render()}}
@stop