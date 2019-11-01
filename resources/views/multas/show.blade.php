@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Multas - <small>Detalle</small></h1>
@stop

@section('content')
<!-- general form elements -->
<div class="box box-info">
    <div class="box-header with-border">
        <!-- <h4>Tip! <small>No olvide que la contraseña generada sera enviada al usuario a su correo electronico proporcionado, recuerde cambiarlo cuando sea logueado por primera vez.</small></h4> -->
    </div>
    <!-- /.box-header -->
    <div class="box-body {{ ($multa->is_voided == true) ? 'cuerpo-marca' : ''}} ">
        @if ($multa->is_voided == true)
        <div class="background">
            <p id="bg-text">Anulada</p>
        </div>
        @endif
        <h1 class="text-center text-info"><small>Boleta de infracción</small></h1>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-5 text-green">
                <h3>PMT (Policia Municipal de Transito)</h3>
                <h4><small>El Estor, Izabal.</small></h4>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-5 col-md-offset-3">
                <div class="form-group has-error">
                    <label for="name">No. Boleta:</label>
                    <label class="form-control text-right">{{$multa->ballot_no}}</label>
                </div>
            </div>
        </div>
        <h1 class="bg-info text-info"><small>Infractor</small></h1>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <label class="form-control text-right">{{$multa->offender->first_name}}</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="name">Apellidos:</label>
                    <label class="form-control text-right">{{$multa->offender->last_name}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="name">No. de Licencia:</label>
                    <label class="form-control text-right">{{$multa->offender->driver_license}}</label>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="name">Tipo de licencia:</label>
                    <label class="form-control text-right">{{$multa->offender->license_class}}</label>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="name">Número de DPI:</label>
                    <label class="form-control text-right">{{$multa->offender->dpi}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="name">Departamento:</label>
                    <label class="form-control text-right">{{$multa->offender->state}}</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="name">Municipio:</label>
                    <label class="form-control text-right">{{$multa->offender->city}}</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="home_address">Dirección de residencia:</label>
                    <label class="form-control text-right">{{$multa->offender->home_address}}</label>
                </div>
            </div>
        </div>
        <h1 class="bg-info text-info"><small>Vehículo del infractor</small></h1>
        <div class="row">
            <div class="col-md-3 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label for="name">Fecha:</label>
                    <label class="form-control text-right">{{$multa->infringement->date}}</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label for="name">Hora:</label>
                    <label class="form-control text-right">{{$multa->infringement->time}}</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="name">Tipo de vehículo:</label>
                    <label class="form-control text-right">{{$multa->offending_vehicle->type_vehicle->type}}</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="name">No. de placa</label>
                    <label class="form-control text-right">{{$multa->offending_vehicle->car_plate}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="name">NIT:</label>
                    <label class="form-control text-right">{{$multa->offending_vehicle->nit}}</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="name">Marca:</label>
                    <label class="form-control text-right">{{$multa->offending_vehicle->mark->name}}</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="name">Color/Diseño:</label>
                    <label class="form-control text-right">{{$multa->offending_vehicle->color_design}}</label>
                </div>
            </div>
        </div>
        <h1 class="bg-info text-info"><small>Razón de la infracción</small></h1>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="place">Lugar de la infracción:</label>
                    <label class="form-control text-right">{{$multa->infringement->place}}</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="infringement_summary">Resumen de la infracción:</label>
                    <label class="form-control text-right">{{$multa->infringement->infringement_summary}}</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="law_basics">Fundamentos de ley:</label>
                    <label class="form-control text-right">{{$multa->infringement->law_basics}}</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="traffic_regulations">Regulaciones de tránsito:</label>
                    <label class="form-control text-right">{{$multa->infringement->traffic_regulations}}</label>
                </div>
            </div>
        </div>
        <h1 class="bg-info text-info"><small>Policía Municipal de Tránsito</small></h1>
        <div class="row">
            <div class="form-group @error('signed') has-error @enderror">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class=" form-group has-warning">
                        <label for="name">Comentario:</label>
                        <label class="form-control">{{($multa->signed == 1 ? 'El infractor firmo el documento' : 'El infractor no firmo el documento')}}</label>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 col-md-offset-5"">
                <div class=" form-group has-success">
                <label for="name">Valor de la multa: Q.</label>
                <label class="form-control text-right">{{$multa->infringement->total}}</label>
            </div>
        </div>
    </div>
</div>
</div> <!-- /.box-body -->
<div class="box-footer">
    <div class="fa-pull-right">
        <a href="{{ route('multas.index') }}" class="btn btn-lg btn-info">
            <i class="fa fa-undo"></i> Cancelar
        </a>
    </div>
</div>
</div> <!-- /.box -->
@stop

@section('js')
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        //Timepicker
        $('#timepicker').timepicker({
            showInputs: false
        });

        // $('#cantidad').inputmask({
        //     mask: "Q. 9999.00"
        // }); //static mask

        Inputmask("9999.00", {
            disablePredictiveText: true
        }).mask("cantidad");
    });
</script>
@stop

@section('css')
<style>
    .input-group-addon {
        width: 50px;
    }

    // Or whatever width you want

    .input-group {
        width: 100%;
    }

    .background {
        position: absolute;
        z-index: 9999;
        background: transparent;
        display: block;
        min-height: 50%;
        min-width: 50%;
        color: yellow;
        padding-top: 230px;
    }

    .cuerpo-marca {
        position: relative;
        z-index: 1;
    }

    #bg-text {
        color: rgba(255, 51, 51, 0.4);
        font-size: 300px;
        transform: rotate(300deg);
        -webkit-transform: rotate(300deg);
    }
</style>
@stop