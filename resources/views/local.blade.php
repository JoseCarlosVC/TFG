@include('head')
@if (session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif
<!-- Comienzo cabecera -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $local->nombreUsuario }}</h1>
        <img class="img-rest" src="{{ asset('storage') . '/' . $local->foto }}" alt="Foto restaurante">
    </div>
</div>
<!-- Fin cabecera -->
<!-- Comienzo platos -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="text-primary">Nuestros platos</h1>
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
                                <input class="form-control boton qr btn btn-primary" type="submit" value="Generar QR">
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
<!-- Fin platos -->
@include('footer')
