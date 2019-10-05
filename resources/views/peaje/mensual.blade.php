@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Peaje - <small>Cobro mensual</small></h1>
<form action="{{ route('peaje.generate.pdf.mensual') }}" method="POST">
    <div class="row">
        @csrf
        <div class="col-md-4 col-md-offset-1">
            <div class="input-group date">
                <div class="input-group-addon">Inicial: </div>
                <input type="text" autocomplete="off" class="datepicker text-right form-control pull-right" data-date-format="dd-mm-yyyy" name="date_initial" id="date_initial" value="{{ old('date_birthday') }}" placeholder="12-12-1998" aria-describedby="help-date_birthday">
            </div>
        </div>
        <div class="col-md-4 col-md-offset-1">
            <div class="input-group date">
                <div class="input-group-addon">Final: </div>
                <input type="text" autocomplete="off" class="datepicker text-right form-control pull-right" data-date-format="dd-mm-yyyy" name="date_final" id="date_final" value="{{ old('date_birthday') }}" placeholder="12-12-1998" aria-describedby="help-date_birthday">
            </div>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-block btn-danger  btn-sm pull-right"><i class="fa fa-file-pdf"></i>&NonBreakingSpace; Generar reporte</input>
            <!-- <a href="{{ route('peaje.generate.pdf.mensual') }}" class="btn btn-block btn-danger  btn-sm pull-right"><i class="fa fa-file-pdf"></i>&NonBreakingSpace; Generar reporte</a> -->
        </div>
    </div>
</form>
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
            <td colspan="4">
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

@section('js')
<script>
    $(function() {
        //Initialize Select2 Elements
        // $('.select2').select2();

        //Date picker
        $('.datepicker').datepicker({
            autoclose: true
        });

        // $('[data-toggle="popover"]').popover();
    });
</script>
@stop