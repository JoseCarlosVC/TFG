@include('head')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $local->nombreUsuario }}</h1>
        <img src="{{ asset('storage') . '/' . $local->foto }}" alt="Foto restaurante">
    </div>
</div>
<!-- Page Header End -->
<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="text-primary">Nuestros platos</h1>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="img/img-600x400-1.jpg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            <i class="fa fa-solar-panel fa-3x"></i>
                        </div>
                        <h4 class="mb-3">Solar Panels</h4>
                        <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
                        <a class="small fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="img/img-600x400-2.jpg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            <i class="fa fa-wind fa-3x"></i>
                        </div>
                        <h4 class="mb-3">Wind Turbines</h4>
                        <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
                        <a class="small fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="img/img-600x400-3.jpg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            <i class="fa fa-lightbulb fa-3x"></i>
                        </div>
                        <h4 class="mb-3">Hydropower Plants</h4>
                        <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
                        <a class="small fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="img/img-600x400-4.jpg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            <i class="fa fa-solar-panel fa-3x"></i>
                        </div>
                        <h4 class="mb-3">Solar Panels</h4>
                        <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
                        <a class="small fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="img/img-600x400-5.jpg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            <i class="fa fa-wind fa-3x"></i>
                        </div>
                        <h4 class="mb-3">Wind Turbines</h4>
                        <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
                        <a class="small fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded overflow-hidden">
                    <img class="img-fluid" src="img/img-600x400-6.jpg" alt="">
                    <div class="position-relative p-4 pt-0">
                        <div class="service-icon">
                            <i class="fa fa-lightbulb fa-3x"></i>
                        </div>
                        <h4 class="mb-3">Hydropower Plants</h4>
                        <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam.</p>
                        <a class="small fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->
@include('footer')
