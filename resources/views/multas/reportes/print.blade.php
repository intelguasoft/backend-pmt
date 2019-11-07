<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de peaje diario</title>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <table>
        <h1 class="text-center text-info"><small>Boleta de infracción</small></h1>
        <div class="row">
            <div class="col-sm-6 col-sm-6 col-xs-6 text-success">
                <h3>PMT (Policia Municipal de Transito)</h3>
                <h4><small>El Estor, Izabal.</small></h4>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 offset-md-4">
                <div class="form-group has-error">
                    <label for="name">No. Boleta:</label>
                    <label class="form-control text-danger text-right">{{$multa->ballot_no}}</label>
                </div>
            </div>
        </div>
        <h3 class="bg-info text-light"><small>Infractor</small></h3>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <label class="form-control">{{$multa->offender->first_name}}</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                    <label for="name">Apellidos:</label>
                    <label class="form-control">{{$multa->offender->last_name}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="name">No. de Licencia:</label>
                    <label class="form-control">{{$multa->offender->driver_license}}</label>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="name">Tipo de licencia:</label>
                    <label class="form-control">{{$multa->offender->license_class}}</label>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="name">Número de DPI:</label>
                    <label class="form-control">{{$multa->offender->dpi}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="name">Departamento:</label>
                    <label class="form-control">{{$multa->offender->state}}</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="name">Municipio:</label>
                    <label class="form-control">{{$multa->offender->city}}</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="home_address">Dirección de residencia:</label>
                    <label class="form-control">{{$multa->offender->home_address}}</label>
                </div>
            </div>
        </div>
        <h3 class="bg-info text-light"><small>Vehículo del infractor</small></h3>
        <div class="row">
            <div class="col-md-3 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label for="name">Fecha:</label>
                    <label class="form-control">{{$multa->infringement->date}}</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-2 col-xs-12">
                <div class="form-group">
                    <label for="name">Hora:</label>
                    <label class="form-control">{{$multa->infringement->time}}</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="name">Tipo de vehículo:</label>
                    <label class="form-control">{{$multa->offending_vehicle->type_vehicle->type}}</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label for="name">No. de placa</label>
                    <label class="form-control">{{$multa->offending_vehicle->car_plate}}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="name">NIT:</label>
                    <label class="form-control">{{$multa->offending_vehicle->nit}}</label>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label for="name">Marca:</label>
                    <label class="form-control">{{$multa->offending_vehicle->mark->name}}</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="name">Color/Diseño:</label>
                    <label class="form-control">{{$multa->offending_vehicle->color_design}}</label>
                </div>
            </div>
        </div>
        <h3 class="bg-info text-light"><small>Razón de la infracción</small></h3>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="place">Lugar de la infracción:</label>
                    <label class="form-control">{{$multa->infringement->place}}</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="infringement_summary">Resumen de la infracción:</label>
                    <label class="form-control">{{$multa->infringement->infringement_summary}}</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="law_basics">Fundamentos de ley:</label>
                    <label class="form-control">{{$multa->infringement->law_basics}}</label>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="traffic_regulations">Regulaciones de tránsito:</label>
                    <label class="form-control">{{$multa->infringement->traffic_regulations}}</label>
                </div>
            </div>
        </div>
        <h3 class="bg-info text-light"><small>Policía Municipal de Tránsito</small></h3>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <div class=" form-group has-warning">
                        <label for="name">Comentario:</label>
                        <label class="form-control">{{($multa->signed == true ? 'El infractor firmo el documento' : 'El infractor no firmo el documento')}}</label>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 offset-md-4"">
                <div class=" form-group">
                <label for="name">Valor de la multa: Q.</label>
                <label class="form-control text-right">{{$multa->infringement->total}}</label>
            </div>
        </div>
        </div>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>