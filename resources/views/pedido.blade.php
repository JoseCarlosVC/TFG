@include('head')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="text-center display-2 text-black animated slideInDown">Tu pedido</h1>
        </div>
        <div class="row g-4">
            @foreach (Session::get('compra') as $producto)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded overflow-hidden">
                        <div class="position-relative p-4 pt-0">
                            <img class="img-fluid" src="{{ asset('storage') . '/' . $producto['foto'] }}" alt="">
                            <h4 class="mb-3">{{ $producto['nombreProducto'] }}</h4>
                            <p>{{ $producto['precio'] }}€
                                x{{ $producto['cantidad'] }}uds.</p>
                            <button
                                class="btnAddAction cart-action small fw-medium btn btn-primary rounded-pill py-1 px-3 mt-1 btnAddAction cart-action"
                                onclick="accionCarro('eliminar',{{ $producto['id'] }})" href="">Eliminar producto<i
                                    class="fa fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="p-lg-5 pe-lg-0">
                <button
                    class="btnAddAction cart-action small fw-medium btn btn-primary rounded-pill py-1 px-3 mt-1 btnAddAction cart-action"
                    onclick="accionCarro('vaciar','')" href="">Eliminar pedido <i class="fas fa-trash"></i>
                </button>
                <button
                    class="btnAddAction cart-action small fw-medium btn btn-primary rounded-pill py-1 px-3 mt-1 btnAddAction cart-action"
                    onclick="accionCarro('confirmar','')" href="">Confirmar pedido<i class="fa fa-arrow-right ms-2"></i>
                </button>
            </div>

        </div>
    </div>
</div>
@include('footer')
