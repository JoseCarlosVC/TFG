<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!--Fuentes de Google-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Kalam:wght@300;400;700&display=swap"
        rel="stylesheet">

    <!--Librerías de iconos-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!--Librerías de la plantilla bootstrap-->
    <link rel="stylesheet" href="{{ asset('lib/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/lightbox/css/lightbox.min.css') }}">

    <!--Plantilla de bootstrap-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!--Modificaciones de la plantilla-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Munchio</title>
</head>

<body>
    <!-- Spinner Start -->
    <!--<div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>-->
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="fas fa-phone-alt"></i>
                    <span class="text-black">+34 600 00 00 00</span>
                </div>
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <a class="btn btn-square" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square" href="https://twitter.com/?lang=es"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square" href="https://es.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-square" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
            <img src="{{ asset('favicon.ico') }}" alt="Logo" id="logo">
            <!--<h2 class="m-0 text-primary">PUF</h2>-->
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link active">Inicio</a>
                <a href="{{ url('/signin') }}" class="nav-item nav-link">Registro</a>
                <a href="{{ url('/login') }}" class="nav-item nav-link">Iniciar sesión</a>
                @if (Session::has('usuario') && Session::get('usuario')['rolUsuario'] == 1)
                    <a href="{{ url('/registrarProducto') }}" class="nav-item nav-link">Registrar Producto</a>
                @endif
                @if (Session::has('usuario') && Session::get('usuario')['rolUsuario'] == 0 && Session::has('compra'))
                    <a href="{{ url('/pedido') }}" class="nav-item nav-link">Ver Pedido</a>
                @endif
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="feature.html" class="dropdown-item">Feature</a>
                        <a href="quote.html" class="dropdown-item">Free Quote</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Get A Quote<i
                    class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->
