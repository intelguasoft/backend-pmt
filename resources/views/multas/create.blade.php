@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Multas - <small>Crear</small></h1>
@stop

@section('content')
<!-- general form elements -->
<div class="box box-info">
    <form role="form" action="{{ route('multas.store') }}" method="POST" autocomplete="off">
        <div class="box-header with-border">
            <!-- <h4>Tip! <small>No olvide que la contraseña generada sera enviada al usuario a su correo electronico proporcionado, recuerde cambiarlo cuando sea logueado por primera vez.</small></h4> -->
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        @csrf
        <div class="box-body">
            <h1 class="text-center text-info"><small>Boleta de infracción</small></h1>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-5 text-green">
                    <h3>PMT (Policia Municipal de Transito)</h3>
                    <h4><small>El Estor, Izabal.</small></h4>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-5 col-md-offset-3">
                    <div class="form-group @error('ballot_no') has-error @enderror">
                        <label for="name">No. Boleta:</label>
                        <input type="number" class="form-control text-right" name="ballot_no" id="ballot_no" value="{{ old('ballot_no') }}" placeholder="9434389" aria-describedby="help-ballot_no">
                        <!-- <span id="help-ballot_no" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('ballot_no')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <h1 class="bg-info text-info"><small>Infractor</small></h1>
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
                    <div class="form-group @error('driver_license') has-error @enderror">
                        <label for="name">No. de Licencia:</label>
                        <input type="text" class="form-control text-right" name="driver_license" id="driver_license" value="{{ old('driver_license') }}" placeholder="4340 9454 90543" aria-describedby="help-driver_license">
                        <!-- <span id="help-driver_license" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('driver_license')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group @error('license_class') has-error @enderror">
                        <label for="name">Tipo de licencia:</label>
                        <!-- <input type="text" class="form-control" name="license_class" id="license_class" value="{{ old('license_class') }}" placeholder="Clase C" aria-describedby="help-license_class"> -->
                        <select class="form-control" name="license_class" id="license_class" placeholder="Perfil">
                            <option value="">[Seleccione]</option>
                            <option value="Clase A" {{ (\Illuminate\Support\Facades\Input::old("license_class") == 'Clase A' ? "selected":"") }}>Clase A</option>
                            <option value="Clase B" {{ (\Illuminate\Support\Facades\Input::old("license_class") == 'Clase B' ? "selected":"") }}>Clase B</option>
                            <option value="Clase C" {{ (\Illuminate\Support\Facades\Input::old("license_class") == 'Clase C' ? "selected":"") }}>Clase C</option>
                            <option value="Clase E" {{ (\Illuminate\Support\Facades\Input::old("license_class") == 'Clase E' ? "selected":"") }}>Clase E</option>
                            <option value="Clase Extranjera" {{ (\Illuminate\Support\Facades\Input::old("license_class") == 'Clase Extranjera' ? "selected":"") }}>Clase Extranjera</option>
                        </select>
                        <!-- <span id="help-license_class" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('license_class')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group @error('dpi') has-error @enderror">
                        <label for="name">Número de DPI:</label>
                        <input type="text" class="form-control text-right" name="dpi" id="dpi" value="{{ old('dpi') }}" placeholder="4324 2543 53454">
                        <!-- <span id="help-dpi" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('dpi')
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
                        <textarea class="form-control" name="home_address" id="home_address" placeholder="Calle de atras de la otra calle" aria-describedby="help-home_address" rows="2">{{ old('home_address') }}</textarea>
                        <!-- <span id="help-home_address" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('home_address')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <h1 class="bg-info text-info"><small>Vehículo del infractor</small></h1>
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group @error('date') has-error @enderror">
                        <label for="name">Fecha:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control text-right pull-right" data-date-format="dd-mm-yyyy" name="date" id="datepicker" value="{{ old('date') }}" placeholder="12-12-1998" aria-describedby="help-date">
                        </div>
                        <!-- <span id="help-date" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('date')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group @error('time') has-error @enderror">
                        <label for="name">Hora:</label>
                        <div class="input-group timepicker">
                            <div class="input-group-addon">
                                <i class="fa fa-clock"></i>
                            </div>
                            <input type="text" class="form-control text-right timepicker pull-right" data-date-format="HH:mm" name="time" id="timepicker" value="{{ old('time') }}" placeholder="12:54" aria-describedby="help-time">
                        </div>
                        <!-- <span id="help-date" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('time')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="form-group @error('type_vehicle_id') has-error @enderror">
                        <label for="name">Tipo de vehículo:</label>
                        <select class="form-control select2" style="width: 100%;" name="type_vehicle_id" id="type_vehicle_id" placeholder="Perfil">
                            <option value="">[Seleccione un tipo de vehículo]</option>
                            @forelse ($tipo_vehiculos as $id => $name)
                            {{-- <option value="{{ $id }}">{{ $name }}</option> --}}
                            <option value="{{ $id }}" {{ (\Illuminate\Support\Facades\Input::old("type_vehicle_id") == $id ? "selected":"") }}>{{ $name }}</option>
                            @empty
                            <option value="">[No hay tipos de vehiculos en nuestros registros]</option>
                            @endforelse
                        </select>
                        @error('type_vehicle_id')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12">
                    <div class="form-group @error('car_plate') has-error @enderror pull-right ">
                        <label for="name">Prefijo:</label>
                        <select class="form-control" name="prefijo_placa" id="prefijo_placa" placeholder="Perfil">
                            <option value="">[Seleccione]</option>
                            <option value="P" {{ (\Illuminate\Support\Facades\Input::old("prefijo_placa") == 'P' ? "selected":"") }}>P</option>
                            <option value="C" {{ (\Illuminate\Support\Facades\Input::old("prefijo_placa") == 'C' ? "selected":"") }}>C</option>
                            <option value="M" {{ (\Illuminate\Support\Facades\Input::old("prefijo_placa") == 'M' ? "selected":"") }}>M</option>
                            <option value="A" {{ (\Illuminate\Support\Facades\Input::old("prefijo_placa") == 'A' ? "selected":"") }}>A</option>
                            <option value="U" {{ (\Illuminate\Support\Facades\Input::old("prefijo_placa") == 'U' ? "selected":"") }}>U</option>
                            <option value="CD" {{ (\Illuminate\Support\Facades\Input::old("prefijo_placa") == 'CD' ? "selected":"") }}>CD</option>
                            <option value="MI" {{ (\Illuminate\Support\Facades\Input::old("prefijo_placa") == 'MI' ? "selected":"") }}>MI</option>
                            <option value="DIS" {{ (\Illuminate\Support\Facades\Input::old("prefijo_placa") == 'DIS' ? "selected":"") }}>DIS</option>
                            <option value="O" {{ (\Illuminate\Support\Facades\Input::old("prefijo_placa") == 'O' ? "selected":"") }}>O</option>
                            <option value="CC" {{ (\Illuminate\Support\Facades\Input::old("prefijo_placa") == 'CC' ? "selected":"") }}>CC</option>
                            <option value="E" {{ (\Illuminate\Support\Facades\Input::old("prefijo_placa") == 'E' ? "selected":"") }}>E</option>
                            <option value="EXT" {{ (\Illuminate\Support\Facades\Input::old("prefijo_placa") == 'EXT' ? "selected":"") }}>EXT</option>
                            <option value="TC" {{ (\Illuminate\Support\Facades\Input::old("prefijo_placa") == 'TC' ? "selected":"") }}>TC</option>
                            <option value="TRC" {{ (\Illuminate\Support\Facades\Input::old("prefijo_placa") == 'TRC' ? "selected":"") }}>TRC</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="form-group @error('car_plate') has-error @enderror">
                        <label for="name">No. de placa</label>
                        <input type="text" class="form-control text-right" name="car_plate" id="car_plate" value="{{ old('car_plate') }}" placeholder="435TCV" aria-describedby="help-car_plate">
                        <!-- <span id="help-car_plate" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('car_plate')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group @error('nit') has-error @enderror">
                        <label for="name">NIT:</label>
                        <input type="text" class="form-control text-right" name="nit" id="nit" value="{{ old('nit') }}" placeholder="4345353-K" aria-describedby="help-nit">
                        <!-- <span id="help-nit" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('nit')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group @error('mark_id') has-error @enderror">
                        <label for="name">Marca:</label>
                        <select class="form-control select2" style="width: 100%;" name="mark_id" id="mark_id" placeholder="Perfil">
                            <option value="">[Seleccione una marca]</option>
                            @forelse ($marcas as $id => $name)
                            {{-- <option value="{{ $id }}">{{ $name }}</option> --}}
                            <option value="{{ $id }}" {{ (\Illuminate\Support\Facades\Input::old("mark_id") == $id ? "selected":"") }}>{{ $name }}</option>
                            @empty
                            <option value="">[No hay marcas en nuestros registros]</option>
                            @endforelse
                        </select>
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
                        <input type="text" class="form-control" name="color_design" id="color_design" value="{{ old('color_design') }}" placeholder="Gris con rayas amarillas" aria-describedby="help-color_design">
                        <!-- <span id="help-color_design" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('color_design')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <h1 class="bg-info text-info"><small>Razón de la infracción</small></h1>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group @error('place') has-error @enderror">
                        <label for="place">Lugar de la infracción:</label>
                        <!-- <input type="text" class="form-control" name="place" id="place" value="" placeholder="Juan Raul" aria-describedby="help-place"> -->
                        <textarea class="form-control" name="place" id="place" placeholder="Calle de atras de la otra calle" aria-describedby="help-place" rows="2">{{ old('place') }}</textarea>
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
                        <textarea class="form-control" name="infringement_summary" id="infringement_summary" placeholder="Se tiro el semaforo en rojo y no respeto el limite de la velocidad." aria-describedby="help-infringement_summary" rows="2">{{ old('infringement_summary') }}</textarea>
                        <!-- <span id="help-infringement_summary" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('infringement_summary')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group @error('law_basics') has-error @enderror">
                        <label for="law_basics">Fundamentos de ley:</label>
                        <!-- <input type="text" class="form-control" name="law_basics" id="law_basics" value="" placeholder="Juan Raul" aria-describedby="help-law_basics"> -->
                        <textarea class="form-control" name="law_basics" id="law_basics" placeholder="Aquí va el argumento de ley sobre la infracción" aria-describedby="help-law_basics" rows="2">{{ old('law_basics') }}</textarea>
                        <!-- <span id="help-law_basics" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('law_basics')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group @error('traffic_regulations') has-error @enderror">
                        <label for="traffic_regulations">Regulaciones de tránsito:</label>
                        <!-- <input type="text" class="form-control" name="traffic_regulations" id="traffic_regulations" value="" placeholder="Juan Raul" aria-describedby="help-traffic_regulations"> -->
                        <textarea class="form-control" name="traffic_regulations" id="traffic_regulations" placeholder="Reglamento de transito  que esta acorde al problema" aria-describedby="help-traffic_regulations" rows="2">{{ old('traffic_regulations') }}</textarea>
                        <!-- <span id="help-traffic_regulations" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('traffic_regulations')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <h1 class="bg-info text-info"><small>Policía Municipal de Tránsito</small></h1>
            <div class="row">
                <div class="form-group @error('signed') has-error @enderror">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="signed" name="signed" value="{{ (!empty(old('signed')) ? 'true' : 'false') }}" {{ (!empty(old('signed')) ? 'checked' : '') }} /> ¿Firmó la boleta de remisión?
                            </label>
                            @error('signed')
                            <br>
                            <span class=" help-block">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 col-md-offset-5"">
                    <div class=" form-group @error('total') has-error @enderror">
                    <label for="name">Valor de la multa: Q.</label>
                    <!-- <input type="number" class="form-control" name="total" id="total" value="{{ old('total') }}" placeholder="500.00" aria-describedby="help-total"> -->
                    <!-- <input type="text" class="form-control" id="cantidad" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask=""> -->
                    <input id="total" name="total" class="form-control text-right" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'digits': 2, 'digitsOptional': false, 'prefix': 'Q ', 'placeholder': '0'" inputmode="numeric" style="text-align: right;">
                    <!-- <span id="help-total" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                    @error('total')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
</div> <!-- /.box-body -->
<div class="box-footer">
    <div class="fa-pull-right">
        <a href="{{ route('multas.index') }}" class="btn btn-lg btn-info">
            <i class="fa fa-undo"></i> Cancelar
        </a>
        <button type="submit" class="btn btn-lg btn-success">
            <i class="far fa-save"></i> Guardar
        </button>
    </div>
</div>
</form>
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
</style>
@stop