@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Costos-Peaje - <small>Crear nuevo</small></h1>
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
        <form role="form" action="{{ route('costos-peajes.update', ['costos' => $costos]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="box-body">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group @error('type_vehicle_id') has-error @enderror">
                        <label for="type_vehicle_id">Tipo de Vehículo:</label>
                        <select class="form-control select2" style="width: 100%;" name="type_vehicle_id" id="type_vehicle_id" placeholder="Tipo de Vehículo">
                            <option value="">[Seleccione un Tipo de Vehículo]</option>
                            @forelse ($tipo_vehiculos as $id => $type)
                            <option value="{{ $id }}" {{ (\Illuminate\Support\Facades\Input::old("type_vehicle_id",$costos->type_vehicle_id) == $id ? "selected":"") }}>{{ $type }}</option>
                            @empty
                            <option value="">[No hay un Tipo de Vehículo selccionado]</option>
                            @endforelse
                        </select>
                        @error('type_vehicle_id')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class=" form-group @error('cost') has-error @enderror">
                        <label for="cost">Costo: Q.</label>
                        <!-- <input type="number" class="form-control" name="total" id="total" value="{{ old('total') }}" placeholder="500.00" aria-describedby="help-total"> -->
                        <!-- <input type="text" class="form-control" id="cantidad" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask=""> -->
                        <input id="cost" value="{{ old('cost', $costos->cost) }}" name="cost" class="form-control text-right" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'digits': 2, 'digitsOptional': false, 'prefix': 'Q ', 'placeholder': '0'" inputmode="numeric" style="text-align: right;">
                        <!-- <span id="help-total" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('cost')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="form-group @error('prefix_car_plate') has-error @enderror">
                        <label for="name">Prefijo:</label>
                        <select class="form-control" name="prefix_car_plate" id="prefix_car_plate" placeholder="Prefijo de la placa">
                            <option value="">[Seleccione]</option>
                            <option value="P-" {{ (\Illuminate\Support\Facades\Input::old("prefix_car_plate", $costos->prefix_car_plate) == 'P-' ? "selected":"") }}>P-</option>
                            <option value="C-" {{ (\Illuminate\Support\Facades\Input::old("prefix_car_plate", $costos->prefix_car_plate) == 'C-' ? "selected":"") }}>C-</option>
                            <option value="M-" {{ (\Illuminate\Support\Facades\Input::old("prefix_car_plate", $costos->prefix_car_plate) == 'M-' ? "selected":"") }}>M-</option>
                            <option value="A-" {{ (\Illuminate\Support\Facades\Input::old("prefix_car_plate", $costos->prefix_car_plate) == 'A-' ? "selected":"") }}>A-</option>
                            <option value="U-" {{ (\Illuminate\Support\Facades\Input::old("prefix_car_plate", $costos->prefix_car_plate) == 'U-' ? "selected":"") }}>U-</option>
                            <option value="CD-" {{ (\Illuminate\Support\Facades\Input::old("prefix_car_plate", $costos->prefix_car_plate) == 'CD-' ? "selected":"") }}>CD-</option>
                            <option value="MI-" {{ (\Illuminate\Support\Facades\Input::old("prefix_car_plate", $costos->prefix_car_plate) == 'MI-' ? "selected":"") }}>MI-</option>
                            <option value="DIS-" {{ (\Illuminate\Support\Facades\Input::old("prefix_car_plate", $costos->prefix_car_plate) == 'DIS-' ? "selected":"") }}>DIS-</option>
                            <option value="O-" {{ (\Illuminate\Support\Facades\Input::old("prefix_car_plate", $costos->prefix_car_plate) == 'O-' ? "selected":"") }}>O-</option>
                            <option value="CC-" {{ (\Illuminate\Support\Facades\Input::old("prefix_car_plate", $costos->prefix_car_plate) == 'CC-' ? "selected":"") }}>CC-</option>
                            <option value="E-" {{ (\Illuminate\Support\Facades\Input::old("prefix_car_plate", $costos->prefix_car_plate) == 'E-' ? "selected":"") }}>E-</option>
                            <option value="EXT-" {{ (\Illuminate\Support\Facades\Input::old("prefix_car_plate", $costos->prefix_car_plate) == 'EXT-' ? "selected":"") }}>EXT-</option>
                            <option value="TC-" {{ (\Illuminate\Support\Facades\Input::old("prefix_car_plate", $costos->prefix_car_plate) == 'TC-' ? "selected":"") }}>TC-</option>
                            <option value="TRC-" {{ (\Illuminate\Support\Facades\Input::old("prefix_car_plate", $costos->prefix_car_plate) == 'TRC-' ? "selected":"") }}>TRC-</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class=" form-group @error('description') has-error @enderror">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" name="description" rows="5" placeholder="Descripción del vehículo" aria-describedby="help-description">{{ old('description', $costos->description) }}</textarea>
                        <!-- <span id="help-description" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('description')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group pull-right">
                        <a href="{{ route('costos-peajes.index') }}" class="btn btn-info">
                            <i class="fa fa-undo"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="far fa-save"></i> Guardar
                        </button>
                    </div>
                </div>
        </form>
    </div>
    <!-- /.box -->

    @stop