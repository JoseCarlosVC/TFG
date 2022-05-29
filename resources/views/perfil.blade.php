@include('head')
<h1 class="text-center display-2 text-black animated slideInDown">Mi usuario</h1>
<div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
    <div class="container about px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeIn" data-wow-delay="0.1s">
                <div class="text-center position-relative h-100">
                    @if (is_null(Session::get('usuario')['foto']))
                        <h2 class="text-primary">No tienes foto subida</h2>
                        <img class="img-medium w-100" src="{{ asset('muchio.png') }}" alt="">
                    @else
                        <img class="img-big w-100"
                            src="{{ asset('storage') . '/' . Session::get('usuario')['foto'] }}" alt="">
                    @endif
                </div>
            </div>
            <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 pe-lg-0">
                    <h2 class="text-primary">
                        {{ Session::get('usuario')['nombreUsuario'] }}
                        {{ is_null(Session::get('usuario')['apellidos']) ? Session::get('usuario')['apellidos'] : '' }}
                    </h2>
                    <ul>
                        <li>
                            Correo electrónico: {{ Session::get('usuario')['correo'] }}
                        </li>
                        <li>
                            Fecha de nacimiento: {{ Session::get('usuario')['fechaNacimiento'] }}
                        </li>
                        <li>
                            Dirección: {{ Session::get('usuario')['direccion'] }}
                        </li>
                        <li>
                            Número de teléfono: {{ Session::get('usuario')['telefono'] }}
                        </li>
                    </ul>
                    <a href="{{ url('/eliminar') }}" id="eliminar"
                        class="btn btn-primary rounded-pill py-3 px-5 mt-3">Eliminar
                        cuenta</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
