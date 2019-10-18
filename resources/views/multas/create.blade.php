@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Multas - <small>Crear</small></h1>
@stop

@section('content')
<!-- general form elements -->
<div class="box box-info">
    <div class="box-header with-border">
        <!-- <h4>Tip! <small>No olvide que la contraseña generada sera enviada al usuario a su correo electronico proporcionado, recuerde cambiarlo cuando sea logueado por primera vez.</small></h4> -->
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{ route('usuarios.store') }}" method="POST" autocomplete="off">
        @csrf
        <div class="box-body">
            <div class="row">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="data-general-all">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#data-general" aria-expanded="true" aria-controls="collapseOne">
                                    INFORMACIÓN GENERAL DE LA BOLETA
                                </a>
                            </h4>
                        </div>
                        <div id="data-general" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="data-general">
                            <div class="panel-body">
                                <div class="col-md-3 col-sm-4 col-xs-12">
                                    <div class="form-group @error('date') has-error @enderror">
                                        <label for="name">Fecha:</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" data-date-format="dd-mm-yyyy" name="date" id="datepicker" value="{{ old('date') }}" placeholder="12-12-1998" aria-describedby="help-date">
                                        </div>
                                        <!-- <span id="help-date" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                        @error('date')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-5 col-md-offset-6">
                                    <div class="form-group @error('ballot_no') has-error @enderror">
                                        <label for="name">No. Boleta:</label>
                                        <input type="number" class="form-control" name="ballot_no" id="ballot_no" value="{{ old('ballot_no') }}" placeholder="9434389" aria-describedby="help-ballot_no">
                                        <!-- <span id="help-ballot_no" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                        @error('ballot_no')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    INFORMACIÓN DEL INFRACTOR
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group @error('first_name') has-error @enderror">
                                            <label for="name">Nombre:</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="Juan Raul" aria-describedby="help-first_name">
                                            <!-- <span id="help-first_name" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                            @error('first_name')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group @error('last_name') has-error @enderror">
                                            <label for="name">Apellidos:</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Caal Coc" aria-describedby="help-last_name">
                                            <!-- <span id="help-last_name" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                            @error('last_name')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group @error('driver_licence') has-error @enderror">
                                            <label for="name">No. de Licencia:</label>
                                            <input type="text" class="form-control" name="driver_licence" id="driver_licence" value="{{ old('driver_licence') }}" placeholder="Otra cosa" aria-describedby="help-driver_licence">
                                            <!-- <span id="help-driver_licence" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                            @error('driver_licence')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group @error('licence_class') has-error @enderror">
                                            <label for="name">Tipo de licencia:</label>
                                            <input type="text" class="form-control" name="licence_class" id="licence_class" value="{{ old('licence_class') }}" placeholder="Clase C" aria-describedby="help-licence_class">
                                            <!-- <span id="help-licence_class" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                            @error('licence_class')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group @error('doc_no') has-error @enderror">
                                            <label for="name">No. de documento:</label>
                                            <input type="text" class="form-control" name="doc_no" id="doc_no" value="{{ old('doc_no') }}" placeholder="43242543534 aria-describedby=" help-doc_no">
                                            <!-- <span id="help-doc_no" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                            @error('doc_no')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-group @error('state') has-error @enderror">
                                            <label for="name">Departamento:</label>
                                            <input type="text" class="form-control" name="state" id="state" value="{{ old('state') }}" placeholder="Izabal" aria-describedby="help-state">
                                            <!-- <span id="help-state" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                            @error('state')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-group @error('city') has-error @enderror">
                                            <label for="name">Municipio:</label>
                                            <input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}" placeholder="Puerto Barrios" aria-describedby="help-city">
                                            <!-- <span id="help-city" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                            @error('city')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group @error('home_address') has-error @enderror">
                                            <label for="home_address">Dirección de residencia:</label>
                                            <!-- <input type="text" class="form-control" name="home_address" id="home_address" value="" placeholder="Juan Raul" aria-describedby="help-home_address"> -->
                                            <textarea class="form-control" name="home_address" id="home_address" placeholder="Calle de atras de la otra calle" aria-describedby="help-home_address" rows="3">{{ old('home_address') }}</textarea>
                                            <!-- <span id="help-home_address" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                            @error('home_address')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#data-infraccion" aria-expanded="false" aria-controls="collapseThree">
                                    INFORMACIÓN DE LA INFRACCIÓN
                                </a>
                            </h4>
                        </div>
                        <div id="data-infraccion" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="form-group @error('type_vehicle_id') has-error @enderror">
                                            <label for="name">Tipo de vehículo:</label>
                                            <div class="input-group">
                                                <select class="form-control select2" style="width: 100%;" name="type_vehicle_id" id="type_vehicle_id" placeholder="Perfil">
                                                    <option value="">[Seleccione un tipo de vehículo]</option>

                                                </select>
                                                <!-- <span id="help-name" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                                <span class="input-group-btn">
                                                    <a href="{{ route('perfiles.create') }}" class="btn btn-default"><i class="fa fa-user-tag"></i></a>
                                                </span>
                                            </div>
                                            @error('type_vehicle_id')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group @error('car_plate') has-error @enderror">
                                            <label for="name">Placa:</label>
                                            <input type="text" class="form-control" name="car_plate" id="car_plate" value="" placeholder="Cuc Choc" aria-describedby="help-car_plate">
                                            <!-- <span id="help-car_plate" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                            @error('car_plate')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group @error('nit') has-error @enderror">
                                            <label for="name">NIT:</label>
                                            <input type="text" class="form-control" name="nit" id="nit" value="" placeholder="Cuc Choc" aria-describedby="help-nit">
                                            <!-- <span id="help-nit" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                            @error('nit')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group @error('mark_id') has-error @enderror">
                                            <label for="name">Marca:</label>
                                            <div class="input-group">
                                                <select class="form-control select2" style="width: 100%;" name="mark_id" id="mark_id" placeholder="Perfil">
                                                    <option value="">[Seleccione una marca]</option>

                                                </select>
                                                <!-- <span id="help-name" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                                <span class="input-group-btn">
                                                    <a href="{{ route('perfiles.create') }}" class="btn btn-default"><i class="fa fa-user-tag"></i></a>
                                                </span>
                                            </div>
                                            @error('mark_id')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group @error('color_design') has-error @enderror">
                                            <label for="name">Color/Diseño:</label>
                                            <input type="text" class="form-control" name="color_design" id="color_design" value="" placeholder="Cuc Choc" aria-describedby="help-color_design">
                                            <!-- <span id="help-color_design" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                            @error('color_design')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#data-pmt" aria-expanded="false" aria-controls="collapseThree">
                                    FUNDAMENTO LEGAL DE LA PMT
                                </a>
                            </h4>
                        </div>
                        <div id="data-pmt" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group @error('place') has-error @enderror">
                                        <label for="place">Lugar de la infracción:</label>
                                        <!-- <input type="text" class="form-control" name="place" id="place" value="" placeholder="Juan Raul" aria-describedby="help-place"> -->
                                        <textarea class="form-control" name="place" id="place" placeholder="Calle de atras de la otra calle" aria-describedby="help-place" rows="3">{{ old('place') }}</textarea>
                                        <!-- <span id="help-place" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                        @error('place')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group @error('infringement_summary') has-error @enderror">
                                        <label for="infringement_summary">Resumen de la infracción:</label>
                                        <!-- <input type="text" class="form-control" name="infringement_summary" id="infringement_summary" value="" placeholder="Juan Raul" aria-describedby="help-infringement_summary"> -->
                                        <textarea class="form-control" name="infringement_summary" id="infringement_summary" placeholder="Calle de atras de la otra calle" aria-describedby="help-infringement_summary" rows="3">{{ old('infringement_summary') }}</textarea>
                                        <!-- <span id="help-infringement_summary" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                        @error('infringement_summary')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group @error('foundation_law') has-error @enderror">
                                        <label for="foundation_law">Fundamentos de ley:</label>
                                        <!-- <input type="text" class="form-control" name="foundation_law" id="foundation_law" value="" placeholder="Juan Raul" aria-describedby="help-foundation_law"> -->
                                        <textarea class="form-control" name="foundation_law" id="foundation_law" placeholder="Calle de atras de la otra calle" aria-describedby="help-foundation_law" rows="3">{{ old('foundation_law') }}</textarea>
                                        <!-- <span id="help-foundation_law" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                        @error('foundation_law')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group @error('traffic_regulations') has-error @enderror">
                                        <label for="traffic_regulations">Regulaciones de transito:</label>
                                        <!-- <input type="text" class="form-control" name="traffic_regulations" id="traffic_regulations" value="" placeholder="Juan Raul" aria-describedby="help-traffic_regulations"> -->
                                        <textarea class="form-control" name="traffic_regulations" id="traffic_regulations" placeholder="Calle de atras de la otra calle" aria-describedby="help-traffic_regulations" rows="3">{{ old('traffic_regulations') }}</textarea>
                                        <!-- <span id="help-traffic_regulations" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                        @error('traffic_regulations')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{ route('multas.index') }}" class="btn btn-info">
                <i class="fa fa-undo"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-success">
                <i class="far fa-save"></i> Guardar
            </button>
        </div>
    </form>
</div>
<!-- /.box -->

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
    });
</script>
@stop

@section('css')
<style>

</style>
@stop