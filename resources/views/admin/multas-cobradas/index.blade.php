@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Multas - <small>Cobros</small></h1>
<a href="{{ route('multas-cobradas.listar') }}" class="btn btn-info  btn-sm pull-right"><i class="fa fa-users-cog"></i>Cobrar Multa</a>
@stop

@section('content')
<table class="table table-condensed table-striped table-bordered table-hover">
    <thead class="bg-primary">
        <tr>
            <th class="text-center" width="50px">ID</th>
            <th class="text-center">Número de Boleta</th>
            <th class="text-center">Nombre de usuario</th>
            <th class="text-center">Comentario</th>
            <th class="text-center">Fecha</th>
            <th class="text-center">Hora</th>
            <th class="text-center">Total</th>
            <th class="text-center" width="180px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($multaspagadas as $multaspagada)
        <tr>
            <td class="text-right">{{ $multaspagada->id }}</td>
            <td class="text-right">{{ $multaspagada->ballot->ballot_no }}</td>
            <td>{{ $multaspagada->user->full_name}}</td>
            <td>{{ $multaspagada->comment}}</td>
            <td class="text-right">{{ $multaspagada->date }}</td>
            <td class="text-right">{{ $multaspagada->time }}</td>
            <td class="text-right">Q. {{ $multaspagada->total }}</td>
            <td>
                <a href="{{ route('multas-cobradas.show', ['multaspagadas' => $multaspagada->ballot_id]) }}" class="btn btn-block btn btn-info btn-xs"><i class="fa fa-search"></i> Detalle</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8">
                <h3 class="text-center">No hay multas pagadas registradas en el sistema.</h3>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
{{$multaspagadas->render()}}
@stop