@extends('adminlte::page')

@section('title', config('adminlte.title', 'AdminLTE 2'))

@section('content_header')
<h1>Usuarios - <small>Editar</small></h1>
@stop

@section('content')
<!-- general form elements -->
<div class="box box-info">
    <div class="box-header with-border">
        <!-- <h3 class="text-muted">Los perfiles son los roles a los que puede estar asociado un usuario.</h3> -->
        <h4>Tip! <small>No olvide que la contraseña generada sera enviada al usuario a su correo electronico proporcionado, recuerde cambiarlo cuando sea logueado por primera vez.</small></h4>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{ route('usuarios.update', ['usuario' => $ usuario->id]) }}" method="POST" autocomplete="off">
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="form-group @error('role_id') has-error @enderror">
                        <label for="name">Perfil:</label>
                        <div class="input-group">
                            <select class="form-control select2" style="width: 100%;" name="role_id" id="role_id" placeholder="Perfil">
                                <option value="">[Seleccione un perfil]</option>
                                @forelse ($roles as $id => $name)
                                {{-- <option value="{{ $id }}">{{ $name }}</option> --}}
                                <!-- <option value="{{ $id }}" {{ (\Illuminate\Support\Facades\Input::old("role_id") == $id ? "selected":"") }}>{{ $name }}</option> -->
                                <option value="{{ old('id', $usuario->role_id) }}" {{ $usuario->role_id == $id ? "selected":"" }}>{{ $name }}</option>
                                @empty
                                <option value="">[No hay perfiles en nuestros registros]</option>
                                @endforelse
                            </select>
                            <!-- <span id="help-name" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                            <!-- <span class="input-group-btn">
                                <a href="{{ route('perfiles.create') }}" class="btn btn-default"><i class="fa fa-user-tag"></i></a>
                            </span> -->
                        </div>
                        @error('role_id')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 col-sm-3 col-xs-12">
                    <div class="form-group @error('oficial_id') has-error @enderror">
                        <label for="name">Oficial ID:</label>
                        <input type="text" class="form-control" name="oficial_id" id="oficial_id" value="{{ old('oficial_id', $usuario->oficial_id) }}" placeholder="9434389" aria-describedby="help-oficial_id">
                        <!-- <span id="help-oficial_id" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('oficial_id')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="form-group @error('date_birthday') has-error @enderror">
                        <label for="name">Fecha de nacimiento:</label>
                        {{-- <input type="text" class="form-control" name="date_birthday" id="date_birthday" value="{{ old('date_birthday', $usuario->date_birthday) }}" placeholder="Fecha de nacimiento" aria-describedby="help-date_birthday"> --}}
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" data-date-format="dd-mm-yyyy" name="date_birthday" id="datepicker" value="{{ old('date_birthday', $usuario->date_birthday) }}" placeholder="12-12-1998" aria-describedby="help-date_birthday">
                        </div>
                        <!-- <span id="help-date_birthday" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('date_birthday')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group @error('first_name') has-error @enderror">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name', $usuario->first_name) }}" placeholder="Juan Raul" aria-describedby="help-first_name">
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
                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name', $usuario->last_name) }}" placeholder="Cuc Choc" aria-describedby="help-last_name">
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
                    <div class="form-group @error('gender') has-error @enderror">
                        <label for="name">Género:</label>
                        <select class="form-control select2" style="width: 100%;" name="gender" id="gender" placeholder="Género">
                            <option value="">[Seleccione un género]</option>
                            <option value="Male" {{ (\Illuminate\Support\Facades\Input::old("gender", $usuario->gender) == 'Male' ? "selected":"") }}>Masculino</option>
                            <option value="Female" {{ (\Illuminate\Support\Facades\Input::old("gender", $usuario->gender) == 'Female' ? "selected":"") }}>Femenino</option>
                            <option value="Undefined" {{ (\Illuminate\Support\Facades\Input::old("gender", $usuario->gender) == 'Undefined' ? "selected":"") }}>Indefinido</option>
                        </select>
                        <!-- <span id="help-gender" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('gender')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group @error('nit') has-error @enderror">
                        <label for="name">NIT:</label>
                        <input type="text" class="form-control" name="nit" id="nit" value="{{ old('nit', $usuario->nit) }}" placeholder="4329043-k" aria-describedby="help-nit">
                        <!-- <span id="help-nit" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('nit')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group @error('dpi') has-error @enderror">
                        <label for="name">DPI:</label>
                        <input type="text" class="form-control" name="dpi" id="dpi" value="{{ old('dpi', $usuario->dpi) }}" placeholder="2248 3030 32303" aria-describedby="help-dpi">
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
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group @error('email') has-error @enderror">
                        <label for="name">Correo electrónico:</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $usuario->email) }}" placeholder="mi.correo@tu-dominio.com" aria-describedby="help-email">
                        <!-- <span id="help-email" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                        @error('email')
                        <span class="help-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="name">Contraseña: <i class="text-info far fa-question-circle" tabindex="0" data-toggle="popover" data-trigger="focus" title="Generación automatica de contraseña" data-content="La contraseña es generada por el sistema y enviada al correo electronico proporcionado, tenga en cuenta informarle al nuevo usuario al momento de crear la cuenta."></i></label>
                        <!-- <input type="text" class="form-control" value="{{ $password }}" placeholder="Contraseña" aria-describedby="help-password" disabled> -->
                        <input type="hidden" name="password" id="password" value="{{ $password }}" aria-describedby="help-password">
                        {{-- <span id="help-password" class="help-block">La contraseña es generada por el sistema y enviada al correo electronico proporcionado, tenga en cuenta informarle al <strong>nuevo usuario</strong> al momento de crear la cuenta.</span> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="btn-group pull-right">
                <a href="{{ route('perfiles.index') }}" class="btn btn-info">
                    <i class="fa fa-undo"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="far fa-save"></i> Actualizar
                </button>
            </div>
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

        $('[data-toggle="popover"]').popover();
    });
</script>
@stop

@section('css')
<style>
    a[data-tool-tip] {
        position: relative;
        text-decoration: none;
        color: rgba(255, 255, 255, 0.75);
    }

    a[data-tool-tip]::after {
        content: attr(data-tool-tip);
        display: block;
        position: absolute;
        background-color: dimgrey;
        padding: 1em 3em;
        color: white;
        border-radius: 5px;
        font-size: .5em;
        bottom: 0;
        left: -180%;
        white-space: nowrap;
        transform: scale(0);
        transition: transform ease-out 150ms,
            bottom ease-out 150ms;
    }

    a[data-tool-tip]:hover::after {
        transform: scale(1);
        bottom: 200%;
    }
</style>
@stop