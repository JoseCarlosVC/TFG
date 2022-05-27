@include('head')
<h1 class="text-center display-2 text-black animated slideInDown">Nuestros restaurantes</h1>
@foreach ($locales as $local)
    <div class="container-fluid bg-light overflow-hidden my-5 px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeIn" data-wow-delay="0.1s">
                    <div class="text-center position-relative h-100">
                        <img class="img-big w-100" src="{{ asset('storage') . '/' . $local->foto }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 pe-lg-0">
                        <h2 class="text-primary">{{ $local->nombreUsuario }}</h2>
                        <a href="{{ url('/local/' . $local->id) }}"
                            class="btn btn-primary rounded-pill py-3 px-5 mt-3">Ver
                            local</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
{{ $locales->links() }}
@include('footer')
