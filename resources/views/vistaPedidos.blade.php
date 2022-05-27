@include('head')
@php
//dd($pedidos->groupBy('usuario__pedidos.id'));
@endphp

@if (Session::has('usuario') && Session::get('usuario')['rolUsuario'] == 0)
    <div class="container-xxl py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-2 text-black animated slideInDown">Mis pedidos</h1>
        </div>
        @foreach ($pedidos->groupBy('id') as $pedido)
            <div class="container">
                <h2 class="mb-4 text-primary">{{ $pedido[0]->created_at }}</h2>
                <div class="row g-4">
                    @foreach ($pedido as $articulo)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item rounded overflow-hidden">
                                <div class="d-flex">
                                    <img class="img-fluid w-75" src="{{ asset('storage') . '/' . $articulo->foto }}"
                                        alt="">
                                </div>
                                <div class="p-4">
                                    <h5 class="mb-4 text-primary>">{{ $articulo->nombreProducto }}</h5>
                                    <p>{{ $articulo->cantidad }}uds. : {{ $articulo->precio }}€</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@elseif (Session::has('usuario') && Session::get('usuario')['rolUsuario'] == 2)
    <div class="container-xxl py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-2 text-black animated slideInDown">Pedidos de los usuarios</h1>
        </div>
        @foreach ($pedidos->groupBy('id') as $pedido)
            <div class="container">
                <h2 class="mb-4 text-primary">{{ $pedido[0]->created_at }}</h2>
                <div class="row g-4">
                    @foreach ($pedido as $articulo)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item rounded overflow-hidden">
                                <div class="d-flex">
                                    <img class="img-fluid w-75" src="{{ asset('storage') . '/' . $articulo->foto }}"
                                        alt="">
                                </div>
                                <div class="p-4">
                                    <h5 class="mb-4 text-primary>">{{ $articulo->nombreProducto }}</h5>
                                    <p>{{ $articulo->cantidad }}uds. : {{ $articulo->precio }}€</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="container row g-4">
                        <ul>
                            <li>
                                <p>{{ $articulo->nombreUsuario }}</p>
                            </li>
                            <li>
                                <p>{{ $articulo->telefono }}</p>
                            </li>
                            <li>
                                <p>{{ $articulo->direccion }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@include('footer')
