<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de peaje mensual</title>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <table class="table table-condensed">
        <tr>
            <td colspan="3">
                <h2 class="text-center text-danger">Reporte de peaje mensual</h2>
            </td>
        </tr>
        <tr>
            <td>
                <label class="text-dark pull-left">Fecha de generación: </label>
                <label class="text-info pull-right">{{ \Carbon\Carbon::now()->format('d-m-Y') }}</label>
            </td>
            <td>
                <label class="text-dark">Fecha inicial: </label>
                <label class="text-info">{{ \Carbon\Carbon::parse($inicial)->format('d-m-Y') }}</label>
            </td>
            <td>
                <label class="text-dark">Fecha final: </label>
                <label class="text-info">{{ \Carbon\Carbon::parse($final)->format('d-m-Y') }}</label>
            </td>
        </tr>
    </table>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-center" width="50px">#</th>
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
                <td>{{ $peaje->type_toll_vehicle->type_vehicle->type }}</td>
                <td class="text-right">{{ $peaje->type_toll_vehicle->prefix_car_plate }}{{ $peaje->car_plate }}</td>
                <td class="text-right">Q. {{ number_format($peaje->type_toll_vehicle->cost, 2) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6">
                    <h3>No hay cobros de peaje registrados en el rango de fecha seleccionado.</h3>
                </td>
            </tr>
            @endforelse
        </tbody>
        @if(!count($peajes) == 0)
        <tfoot>
            <tr>
                <th class="text-right" colspan="5">Resumen total: </th>
                <th class="text-right">Q. {{ number_format($total_dia, 2) }}</th>
            </tr>
        </tfoot>
        @endif
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>