<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 2'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="./landing/img/favicon.ico" rel="icon">
    <link href="./landing/img/iconpmt.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="./landing/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="./landing/lib/animate/animate.min.css" rel="stylesheet">
    <link href="./landing/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="./landing/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="./landing/lib/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="./landing/css/style.css" rel="stylesheet">

    <!-- =======================================================
    Theme Name: Avilon
    Theme URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

    <!--==========================
    Header
  ============================-->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <h1><a href="#intro" class="scrollto">PMT El Estor</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="#intro"><img src="./landing/img/logo.png" alt="" title=""></a> -->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#intro">Inicio</a></li>
                    <li><a href="#about">Nosotros</a></li>
                    <li><a href="#show-tolls">Multas</a></li>
                    <li><a href="#team">Nuestro equipo</a></li>
                    <li><a href="#gallery">Galería</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#contact">Contactar</a></li>
                    <li><a href="/login">Acceso</a></li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->

    <!--==========================
    Intro Section
============================-->
    <section id="intro">

        <div class="intro-text">
            <h2></h2>
            <p class="text-justify">Velar por el ordenamiento vial, coordinar y regular el tránsito y transporte en el Municipio de El Estor, del Departamento de Izabal, por medio del cumplimiento de la Ley de Transito y su Reglamento, así como Normas Municipales y otras Leyes referentes a Tránsito.</p>
            <a href="#show-tolls" class="btn-get-started scrollto">Ver multas</a>
        </div>

        <div class="product-screens">

            <div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
                <img src="./landing/img/PMT4.jpg" alt="">
            </div>

            <div class="product-screen-2 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.6s">
                <img src="./landing/img/PMT5.png" alt="">
            </div>

            <div class="product-screen-3 wow fadeInUp" data-wow-duration="0.6s">
                <img src="./landing/img/PMT1.png" alt="">
            </div>

        </div>

    </section><!-- #intro -->

    <main id="main">

        <!--==========================
    About Us Section
============================-->
        <section id="about" class="section-bg">
            <div class="container-fluid">
                <div class="section-header">
                    <h3 class="section-title">Nosotros</h3>
                    <span class="section-divider"></span>
                    <div class="section-description text-justify" style="margin:5px 10px">
                        <p>La Policía Municipal de Tránsito – PMT – fue creada en el año 2,016, de acuerdo con el alcalde municipal de la época, Rony Méndez Caal.</p>

                        <p class="text-justify">
                            La Policía Municipal de Tránsito inició con 12 agentes de tránsito,
                            de los cuales 4 eran mujeres, también se inició con 1 autopatrulla
                            y 2 motocicletas, iniciando labores en marzo de 2016.
                            Los agentes recibieron un adiestramiento de cuatro meses a cargo de
                            una empresa técnica en sistemas de seguridad, además de que un requisito
                            muy importante para optar a ser parte de la PMT era haber cerrado pensum
                            de Diversificado.<br />
                            <br />
                            No olvides que la Policía Municipal de Tránsito de la El Estor, Izabal.
                            Se caracteriza por el orden y la disciplina, estando al servicio del vecino
                            en el momento que más lo necesita, y siendo eso, uno de los principales objetivos
                            por cumplir día con día en El Estor, Izabal. <br />
                            Somos una institución municipal semiautonoma encargada de velar por el ordenamiento
                            vial, coordinar y regular el transito y transporte en el Municipio de El Estor, del
                            Departamento de Izabal, por medio del cumplimiento de la Ley de Transito y su Reglamento,
                            así como Normas Municipales y otras Leyes referentes a Tránsito.

                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 about-img wow fadeInLeft">
                        <img src="./landing/img/LOGOPMT2.png" alt="">
                    </div>

                    <div class="col-lg-6 content wow fadeInRight">
                        <h2>El objetivo de la creación de la Policía Municipal de Tránsito era y sigue siendo:</h2>
                        <ul>
                            <li><i class="ion-android-checkmark-circle"></i>Supervisar y regular el tránsito municipio de El Estor, Izabal.</li>
                            <li><i class="ion-android-checkmark-circle"></i>Montaje de operativos varios (alcoholímetros, carreras clandestinas, transporte pesado, etc.).</li>
                            <li><i class="ion-android-checkmark-circle"></i>Operativos de control de buses y taxis.</li>
                            <li><i class="ion-android-checkmark-circle"></i>Ejecución de planes operativos y órdenes de servicio.</li>
                            <li><i class="ion-android-checkmark-circle"></i>Apoyo a infraestructura, señalización y cambios de vía.</li>
                        </ul>

                    </div>
                </div>

            </div>
        </section><!-- #about -->

        <!--==========================
    Product Featuress Section
============================-->
        <section id="features">
            <div class="container">

                <div class="row">

                    <div class="col-lg-8 offset-lg-4">
                        <div class="section-header wow fadeIn" data-wow-duration="1s">
                            <h3 class="section-title">Nuestos Deber</h3>
                            <span class="section-divider"></span>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-5 features-img">
                        <img src="./landing/img/PMT6.jpg" alt="" class="wow fadeInLeft">
                    </div>

                    <div class="col-lg-8 col-md-7 ">

                        <div class="row">

                            <div class="col-lg-6 col-md-6 box wow fadeInRight">
                                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                                <h4 class="title"><a href="">Cobro de peaje</a></h4>
                                <p class="description text-justify">Se realiza los cobros de peaje a transporte pesado en nuestra garita municipal, para la inversión en nuestras calles.</p>
                            </div>
                            <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.1s">
                                <div class="icon"><i class="ion-model-s"></i></div>
                                <h4 class="title"><a href="">Ordenamiento vial</a></h4>
                                <p class="description text-justify">En cordinacion de los cocodes establecemos las vias direccionamiento de calles de El Estor, Izabal. Asi mismo establecemos las velocidades limites dentro del casco urbano.</p>
                            </div>
                            <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.2s">
                                <div class="icon"><i class="ion-ios-compose-outline"></i></div>
                                <h4 class="title"><a href="">Imposición de remisión</a></h4>
                                <p class="description text-justify">Por regulación vial y en marco de la legalidad como institución podemos hacer uso de remisiones para sanciones a vehiculos que infringen la ley de tránsito .</p>
                            </div>
                            <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.3s">
                                <div class="icon"><i class="ion-android-hand"></i></div>
                                <h5 class="title"><a href="">Coordinación de red vial en eventos</a></h5>
                                <p class="description text-justify">Brindamos servicio a la sociedad apoyandola en eventos sociales para una mejor seguridad vial.</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </section><!-- #features -->

        <!--==========================
    Product Advanced Featuress Section
============================-->
        <section id="advanced-features">

            <div class="features-row section-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <img class="advanced-feature-img-right wow fadeInRight" src="./landing/img/PMTEDUCACIONVIAL.jpg" alt="">
                            <div class="wow fadeInLeft">
                                <h2>Festival construyendo la paz por El Estor, Izabal.</h2>
                                <h3>SEGURIDAD Y EDUCACIÓN VIAL.</h3>
                                <p class="text-justify">En cumplimiento con el ordenamiento vial brindan Educación Vial a niños
                                    quienes hacen presentes dicho festival.</p>
                                <p class="text-justify">De esta manera se fomenta la Educación Vial de manera adecuada,
                                    a niños y niñas de nuestro municipio...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="features-row">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <img class="advanced-feature-img-left" src="./landing/img/PMTVIAL.png" alt="">
                            <div class="wow fadeInRight">
                                <h2>Ordenamiento Vial</h2>
                                <i class="ion-android-cancel" class="wow fadeInRight" data-wow-duration="0.5s"></i>
                                <p class="wow fadeInRight" data-wow-duration="0.5s">La Policia Municipal de Tránsito vela por reparaciones de los semáforos y brinda ayuda la movilidad vial.</p>
                                <i class="ion-flag wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.5s"></i>
                                <p class="wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.5s">La Policia Municipal de Tránsito contribuye a organizacion de vias conjuntamente con los cocodes.</p>
                                <i class="ion-map wow fadeInRight" data-wow-delay="0.4" data-wow-duration="0.5s"></i>
                                <p class="wow fadeInRight" data-wow-delay="0.4s" data-wow-duration="0.5s">La Policia Municipal de Tránsito otorga tarjetas para taxistas conforme a la lista previamente acordada con la junta de taxistas de El Estor, Izabal.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="features-row section-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <img class="advanced-feature-img-right wow fadeInRight" src="./landing/img/PMT1.jpg" alt="">
                            <div class="wow fadeInLeft">
                                <h2>Colaboración en actividades</h2>
                                <h3>Promoviendo la cultura y el deporte.</h3>
                                <i class="ion-ios-albums-outline"></i>
                                <p class="text-justify">Como parte de los compromisos adquiridos a la sociedad la Policia Municipalidad de Tránsito de El Estor, Izabal. Apoya en la diferentes actividades socio-culturales, para promover el deporte y asi fomententar el la disciplina a los niños, jovenes y adultos de El Estor, Izabal.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #advanced-features -->

        <!--==========================
    Call To Action Section
============================-->
        <!-- <section id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-center text-lg-left">
                    <h3 class="cta-title">Call To Action</h3>
                    <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="#">Call To Action</a>
                </div>
            </div>

        </div>
    </section>#call-to-action -->

        <!--==========================
    More Features Section
============================-->
        <!-- <section id="more-features" class="section-bg">
            <div class="container">

                <div class="section-header">
                    <h3 class="section-title">Servicios</h3>
                    <span class="section-divider"></span>
                    <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="box wow fadeInLeft">
                            <div class="icon"><i class="ion-ios-stopwatch-outline"></i></div>
                            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident etiro rabeta lingo.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInRight">
                            <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
                            <h4 class="title"><a href="">Dolor Sitema</a></h4>
                            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata nodera clas.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInLeft">
                            <div class="icon"><i class="ion-ios-heart-outline"></i></div>
                            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur trinige zareta lobur trade.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInRight">
                            <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
                            <h4 class="title"><a href="">Magni Dolores</a></h4>
                            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>
                        </div>
                    </div>

                </div>
            </div>
        </section> -->
        <!-- #more-features -->

        <!--==========================
    Clients
============================-->
        <!-- <section id="clients">
        <div class="container">

            <div class="row wow fadeInUp">

                <div class="col-md-2">
                    <img src="./landing/img/clients/client-1.png" alt="">
                </div>

                <div class="col-md-2">
                    <img src="./landing/img/clients/client-2.png" alt="">
                </div>

                <div class="col-md-2">
                    <img src="./landing/img/clients/client-3.png" alt="">
                </div>

                <div class="col-md-2">
                    <img src="./landing/img/clients/client-4.png" alt="">
                </div>

                <div class="col-md-2">
                    <img src="./landing/img/clients/client-5.png" alt="">
                </div>

                <div class="col-md-2">
                    <img src="./landing/img/clients/client-6.png" alt="">
                </div>

            </div>
        </div>
    </section>#more-features -->

        <!--==========================
    Call To Action Section
============================-->
        <section id="show-tolls">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 text-justify text-lg-left">
                        <h3 class="cta-title">Multas</h3>
                        <p class="cta-text">¿Quieres saber si tienes alguna multa pendiente de pago.?</p>
                        <p class="cta-text">Si tienes alguna multa pendiente de pago, debes dirigirte a nuestras oficinas los mas pronto posible y evitar recargos por incumplimiento de deberes.</p>
                    </div>
                    <div class="col-md-5">
                        <form>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group @error('prefijo') has-error @enderror">
                                        <label for="prefijo" class="cta-text">Tipo de placa:</label>
                                        <select class="form-control" name="prefijo" id="prefijo" placeholder="Perfil">
                                            <option value="">[Seleccione]</option>
                                            <option value="P" {{ (\Illuminate\Support\Facades\Input::old("prefijo") == 'P' ? "selected":"") }}>P</option>
                                            <option value="C" {{ (\Illuminate\Support\Facades\Input::old("prefijo") == 'C' ? "selected":"") }}>C</option>
                                            <option value="M" {{ (\Illuminate\Support\Facades\Input::old("prefijo") == 'M' ? "selected":"") }}>M</option>
                                            <option value="A" {{ (\Illuminate\Support\Facades\Input::old("prefijo") == 'A' ? "selected":"") }}>A</option>
                                            <option value="U" {{ (\Illuminate\Support\Facades\Input::old("prefijo") == 'U' ? "selected":"") }}>U</option>
                                            <option value="CD" {{ (\Illuminate\Support\Facades\Input::old("prefijo") == 'CD' ? "selected":"") }}>CD</option>
                                            <option value="MI" {{ (\Illuminate\Support\Facades\Input::old("prefijo") == 'MI' ? "selected":"") }}>MI</option>
                                            <option value="DIS" {{ (\Illuminate\Support\Facades\Input::old("prefijo") == 'DIS' ? "selected":"") }}>DIS</option>
                                            <option value="O" {{ (\Illuminate\Support\Facades\Input::old("prefijo") == 'O' ? "selected":"") }}>O</option>
                                            <option value="CC" {{ (\Illuminate\Support\Facades\Input::old("prefijo") == 'CC' ? "selected":"") }}>CC</option>
                                            <option value="E" {{ (\Illuminate\Support\Facades\Input::old("prefijo") == 'E' ? "selected":"") }}>E</option>
                                            <option value="EXT" {{ (\Illuminate\Support\Facades\Input::old("prefijo") == 'EXT' ? "selected":"") }}>EXT</option>
                                            <option value="TC" {{ (\Illuminate\Support\Facades\Input::old("prefijo") == 'TC' ? "selected":"") }}>TC</option>
                                            <option value="TRC" {{ (\Illuminate\Support\Facades\Input::old("prefijo") == 'TRC' ? "selected":"") }}>TRC</option>
                                        </select>
                                        @error('prefijo')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group @error('placa') has-error @enderror">
                                        <label for="placa" class="cta-text">Número de placa</label>
                                        <input type="text" class="form-control" id="placa" name="placa" value="{{ \Illuminate\Support\Facades\Input::old('placa') }}" aria-describedby="placaHelp" placeholder="432PTT">
                                        <small id="placaHelp" class="form-text cta-text">Ingrese la placa de su vehículo.</small>
                                        @error('placa')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class=" row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark btn-block">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- <a class="align-middle" href="#">Ir al portal</a> -->

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-dark">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Placa</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($multas as $multa)
                                <tr>
                                    <th scope="row">{{$multa->offending_vehicle->car_plate}}</th>
                                    <td>{{$multa->offending_vehicle->mark->name}}</td>
                                    <td>{{$multa->offending_vehicle->color_design}}</td>
                                    <td>{{$multa->infringement->date}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No hay datos</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section><!-- #call-to-action -->

        <!--==========================
    Frequently Asked Questions Section
============================-->
        <section id="faq">
            <div class="container">

                <div class="section-header">
                    <h3 class="section-title">Preguntas frecuentes</h3>
                    <span class="section-divider"></span>
                    <p class="section-description">Si tienes alguna duda sobre nuestros servicios, acá puedes encontrar algunas respuestas a tus preguntas.</p>
                </div>

                <ul id="faq-list" class="wow fadeInUp">
                    <li>
                        <a data-toggle="collapse" class="collapsed" href="#faq1">¿Cómo sé que tengo una multa? <i class="ion-android-remove"></i></a>
                        <div id="faq1" class="collapse" data-parent="#faq-list">
                            <p>
                                Debe de buscar en el portal en la sección multa por la placa del vehículo.
                            </p>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" class="collapsed" href="#faq2">¿Dónde puedo pagar la multa ? <i class="ion-android-remove"></i></a>
                        <div id="faq2" class="collapse" data-parent="#faq-list">
                            <p>
                                La multa unicamente puede ser pagada en la oficina de arbitrios municipales.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" class="collapsed" href="#faq3">¿Cuál es el proceso que debo seguir para pagar una multa? <i class="ion-android-remove"></i></a>
                        <div id="faq3" class="collapse" data-parent="#faq-list">
                            <p>
                                Primero debe de ir a las oficinas de la PMT El Estor, Izabal, en la siguiente direccion 1a. Calle 5-28 Zona 1,Bo. Centro. Allí le indicaran el proceso a seguir.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" class="collapsed" href="#faq4">¿Cuánto tiempo tiene uno para pagar la multa? <i class="ion-android-remove"></i></a>
                        <div id="faq4" class="collapse" data-parent="#faq-list">
                            <p>
                                Según nuestro acuerdo municipal, son 30 dás calendario que tiene para pagar la multa.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" class="collapsed" href="#faq5">¿Si pasa los 30 días después de tener una multa que pasa ? <i class="ion-android-remove"></i></a>
                        <div id="faq5" class="collapse" data-parent="#faq-list">
                            <p>
                                El juez municipal en su facultad firmará una orden de decomiso a su vehiculo, para que así pague la multa vigente.
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
        </section><!-- #faq -->

        <!--==========================
    Our Team Section
============================-->
        <section id="team" class="section-bg">
            <div class="container">
                <div class="section-header">
                    <h3 class="section-title">Nuestro equipo de trabajo</h3>
                    <span class="section-divider"></span>
                    <p class="section-description">Aca aparece todo nuestro recurso humano, conocelos y evita ser engañado por personas ajenas a la institución.</p>
                </div>
                <div class="row wow fadeInUp">
                    <div class="col-lg-3 col-md-6">
                        <div class="member">
                            <div class="pic"><img src="./landing/img/team/team-1.jpg" alt=""></div>
                            <span>Agente Municipal</span>
                            <!-- <div class="social">
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-linkedin"></i></a>
                        </div> -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="member">
                            <div class="pic"><img src="./landing/img/team/team-2.jpg" alt=""></div>

                            <span>Agente Municipal</span>
                            <!-- <div class="social">
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-linkedin"></i></a>
                        </div> -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="member">
                            <div class="pic"><img src="./landing/img/team/team-3.jpg" alt=""></div>
                            <span>Agente Municipal</span>
                            <!-- <div class="social">
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-linkedin"></i></a>
                        </div> -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="member">
                            <div class="pic"><img src="./landing/img/team/team-4.jpg" alt=""></div>
                            <span>Jueza Municipal</span>
                            <!-- <div class="social">
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-linkedin"></i></a>
                        </div> -->
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- #team -->

        <!--==========================
    Gallery Section
============================-->
        <section id="gallery">
            <div class="container-fluid">
                <div class="section-header">
                    <h3 class="section-title">Galería</h3>
                    <span class="section-divider"></span>
                    <p class="section-description">Todas nuestras actividades estan plasmadas en imagenes, tomate tu tiempo y observa.</p>
                </div>

                <div class="row no-gutters">

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="./landing/img/gallery/PMTAC1.jpg" class="gallery-popup">
                                <img src="./landing/img/gallery/PMTAC1.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="./landing/img/gallery/PMTAC2.jpg" class="gallery-popup">
                                <img src="./landing/img/gallery/PMTAC2.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="./landing/img/gallery/PMTAC3.jpg" class="gallery-popup">
                                <img src="./landing/img/gallery/PMTAC3.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="./landing/img/gallery/PMTAC4.jpg" class="gallery-popup">
                                <img src="./landing/img/gallery/PMTAC4.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="./landing/img/gallery/PMTAC5.jpg" class="gallery-popup">
                                <img src="./landing/img/gallery/PMTAC5.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="./landing/img/gallery/PMTAC6.jpg" class="gallery-popup">
                                <img src="./landing/img/gallery/PMTAC6.jpg" alt="">
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- #gallery -->

        <!--==========================
    Contact Section
============================-->
        <section id="contact">
            <div class="container">
                <div class="row wow fadeInUp">

                    <div class="col-lg-4 col-md-4">
                        <div class="contact-about">
                            <h3>PMT El Estor</h3>
                            <p>Si tiene alguna sugerencia o alguna queja que desea hacernos, ponganse en contacto con nostros y nos comunicaremos a la menor brevedad posible.</p>
                            <div class="social-links">
                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="info">
                            <div>
                                <i class="ion-ios-location-outline"></i>
                                <p>1a. Calle 5-28 Zona 1,<br />Bo. Centro, El Estor, Izabal.</p>
                            </div>

                            <div>
                                <i class="ion-ios-email-outline"></i>
                                <p>secretariaelestor@gmail.com</p>
                            </div>

                            <div>
                                <i class="ion-ios-telephone-outline"></i>
                                <p>+502 7949 7019</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-5 col-md-8">
                        <div class="form">
                            <div id="sendmessage">Su mensaje ha sido enviado con exito. Gracias por su tiempo!</div>
                            <div id="errormessage"></div>
                            <form action="" method="post" role="form" class="contactForm">
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Nombre completo" data-rule="minlen:4" data-msg="Por favor ingrese al menos 4 caracteres" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Correo electronico" data-rule="email" data-msg="Por favor ingrese un correo electronico valido" />
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Tema de interes" data-rule="minlen:4" data-msg="Por favor ingrese al menos 8 caracteres en el tema" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Mensaje sobre su tema de interes" placeholder="Mensaje"></textarea>
                                    <div class="validation"></div>
                                </div>
                                <div class="text-center"><button type="submit" title="Enviar mensaje">Enviar mensaje</button></div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- #contact -->

    </main>

    <!--==========================
    Footer
    ============================-->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-lg-left text-center">
                    <div class="copyright">
                        &copy; Copyright <strong>PMT El Estor</strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Avilon
            -->
                        Designed by <a href="https://pmt.cunadelmanati.com.gt/">Edgar Chub</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                        <a href="#intro" class="scrollto">Inicio</a>
                        <a href="#about" class="scrollto">Nosotros</a>
                        <a href="#">Politica de privacidad</a>
                        <a href="#">Terminos de uso</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer><!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="./landing/lib/jquery/jquery.min.js"></script>
    <script src="./landing/lib/jquery/jquery-migrate.min.js"></script>
    <script src="./landing/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./landing/lib/easing/easing.min.js"></script>
    <script src="./landing/lib/wow/wow.min.js"></script>
    <script src="./landing/lib/superfish/hoverIntent.js"></script>
    <script src="./landing/lib/superfish/superfish.min.js"></script>
    <script src="./landing/lib/magnific-popup/magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript File -->
    <script src="./landing/contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="./landing/js/main.js"></script>
    <script>
        $(document).ready(function() {
            @if($scroll)
            $('html, body').animate({
                scrollTop: $('#show-tolls').offset().top
            }, 'slow');
            @endif
        });
    </script>

</body>

</html>