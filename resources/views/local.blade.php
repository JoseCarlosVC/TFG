@include('head')
<!-- Comienzo cabecera -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $local->nombreUsuario }}</h1>
        <img src="{{ asset('storage') . '/' . $local->foto }}" alt="Foto restaurante">
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
                            <a class="small fw-medium" href="">Añadir al pedido<i
                                    class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Fin platos -->
@include('footer')
