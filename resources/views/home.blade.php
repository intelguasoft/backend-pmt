@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>
    Graficas Gerenciales
    <small> Cobros y Multas</small>
</h1>
@stop

@section('content')
<div class="row">
<div class="col-xs-12">
    <!-- Bar chart -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <i class="fa fa-bar-chart-o"></i>

            <h2 class="box-title">Total recaudado de multas por mes - Año 2019</h2>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div id="bar-chart-multas" style="height: 300px;"></div>
        </div>
        <!-- /.box-body-->
    </div>
</div>
</div>


<!-- /.box -->
<div class="row">
<div class="col-xs-12">
    <!-- Bar chart -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <i class="fa fa-bar-chart-o"></i>

            <h2 class="box-title">Total peajes recaudado por mes - Año 2019</h2>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div id="bar-chart-peajes-mes" style="height: 300px;"></div>
        </div>
        <!-- /.box-body-->
    </div>
</div>
</div>



@stop

@section('js')
<script>
    $(function() {
    let data_peajes={ data: [],color:''};
    let data_multas={ data: [],color:''};


    /*
    * BAR CHART 1
    * ---------
    */

    $.get("{{ route('graficas.multas.totales.meses') }}", function(multas, status)
    {
    // alert("Data: " + data + "\nStatus: " + status);
    data_multas.data = multas;
    console.log(data_multas);
    data_multas.color ='#3c8dbc';
    $.plot('#bar-chart-multas', [data_multas],
    {
    grid: {
    borderWidth: 1,
    borderColor: '#f3f3f3',
    tickColor: '#f3f3f3'
    },
    series: {
    bars: {
    show: true,
    barWidth: 0.5,
    align: 'center'
    }
    },
    xaxis: {
    mode: 'categories',
    tickLength: 0
    }
    })
    });

    /*
    * BAR CHART 2
    * ---------
    */

    $.get("{{ route('graficas.peajes.totales.meses') }}", function(peajes, status)
    {
    // alert("Data: " + data + "\nStatus: " + status);
    data_peajes.data = peajes;
    console.log(data_peajes);
    data_peajes.color ='#3c8dbc';
    $.plot('#bar-chart-peajes-mes', [data_peajes],
    {
    grid: {
    borderWidth: 1,
    borderColor: '#f3f3f3',
    tickColor: '#f3f3f3'
    },
    series: {
    bars: {
    show: true,
    barWidth: 0.5,
    align: 'center'
    }
    },
    xaxis: {
    mode: 'categories',
    tickLength: 0
    }
    })
    });

    })

    /*
    * Custom Label formatter
    * ----------------------
    */
    function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' +
        label +
        '<br>' +
        Math.round(series.percent) + '%</div>'
    }
</script>
@endsection