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
    <link href="./landing/img/apple-touch-icon.png" rel="apple-touch-icon">

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
                <h1><a href="/" class="scrollto">PMT El Estor</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="#intro"><img src="./landing/img/logo.png" alt="" title=""></a> -->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="/">Regresar al sitio</a></li>
                    <li><a href="/login">Acceso</a></li>
                </ul>
            </nav>
        </div>
    </header><!-- #header -->

    <!--==========================
    Our Team Section
============================-->
    <section id="intro" class="section-bg">
        <ul class="container">
            <div class="section-header">
                <h3 class="section-title">Nuestro equipo de trabajo</h3>
                <span class="section-divider"></span>
                <p class="section-description">Aca aparece todo nuestro recurso humano, conocelos y evita ser engañado por personas ajenas a la institución.</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </section><!-- #team -->

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

</body>

</html>