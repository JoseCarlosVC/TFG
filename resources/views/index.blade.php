@include('head')
<?php
//dd(session()->all());
?>
<!-- Comienzo Carrusel -->
<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <h1 class="display-2 text-black animated slideInDown">Platos destacados</h1>
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative" data-dot="<img src='{{ asset('images/dish-1.png') }}'>">
            <img class="img-fluid" src="{{ asset('images/dish-1.png') }}" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <p class="fs-5 fw-medium text-white mb-4 pb-3">Vero elitr justo clita lorem. Ipsum dolor
                                at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea
                                elitr.</p>
                            <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Haz tu
                                pedido</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Carrusel -->

<!-- Comienzo restaurantes -->
<h1 class="display-2 text-black animated slideInDown">Nuestros restaurantes</h1>
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    @foreach ($locales as $local)
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeIn" data-wow-delay="0.1s">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-big w-100 h-100"
                            src="{{ asset('storage') . '/' . $local->foto }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <h6 class="text-primary">{{ $local->nombreUsuario }}</h6>
                        <h1 class="mb-4">25+ Years Experience In Solar & Renewable Energy Industry</h1>
                        <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.
                            Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet</p>
                        <p><i class="fas fa-check-circle"></i></i>Diam dolor diam ipsum</p>
                        <p><i class="fas fa-check-circle"></i></i>Aliqu diam amet diam et eos</p>
                        <p><i class="fas fa-check-circle"></i></i>Tempor erat elitr rebum at clita</p>
                        <a href="{{ url('/local/' . $local->id) }}"
                            class="btn btn-primary rounded-pill py-3 px-5 mt-3">Ver
                            local</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- Fin restaurantes -->


<!-- Comienzo Platos -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-2 text-black animated slideInDown">Especialidades del día</h1>
        </div>
        <div class="row g-4">
            @foreach ($productos as $producto)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded overflow-hidden">
                        <img class="img-fluid" src="{{ asset('storage') . '/' . $producto->foto }}" alt="">
                        <div class="position-relative p-4 pt-0">
                            <h4 class="mb-3">{{ $producto->nombreProducto }}</h4>
                            <p>{{ $producto->detalles }}</p>
                            <input type="number" class="boton border-0" id="cant_{{ $producto->id }}" name="cantidad"
                                min="1" value="1" size="3" />
                            <button id="add_{{ $producto->id }}"
                                class="btnAddAction cart-action small fw-medium btn btn-primary rounded-pill py-1 px-1 mt-1 btnAddAction cart-action"
                                onclick="accionCarro('add',{{ $producto->id }})" href="">Añadir
                                al pedido<i class="fa fa-arrow-right ms-2"></i></button>
                            <form class="generarQR" id="{{ $producto->id }}" action="" onsubmit="return false">
                                <input class="boton qr" type="submit" value="Generar QR">
                                <input id="nombre_{{ $producto->id }}" type="hidden"
                                    value="{{ $producto->nombreProducto }}">
                                <input id="precio_{{ $producto->id }}" type="hidden"
                                    value="{{ $producto->precio }}€">
                                <input id="detalles_{{ $producto->id }}" type="hidden"
                                    value="{{ $producto->detalles }}">
                                <!-- Aquí mostraremos cuando el usuario clickee el código QR -->
                                <div>
                                    <img id="codigoQR_{{ $producto->id }}" src="" alt="">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Fin Platos -->
@include('footer')
