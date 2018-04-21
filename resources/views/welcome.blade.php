@extends('app')
@section('content')
    <!-- hero-section start -->
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                    <div class="hero-section-caption pinside40">
                        <h1 class="hero-title">Provinsi Rawan Kriminal</h1>
                        <a href="domestic-tour.html" class="btn btn-primary ">Lihat Lainnya</a> </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-3 col-xs-3">
            <div class="service-block">
               <div class="service-content">
                   <div class="row">
                       <div class="col-md-4">
                           <h1><a href="#" class="title">10000</a></h1>
                       </div>
                       <div class="col-lg-7">
                           <p>Tindakan Kriminal Yang Terselesaikan</p>
                       </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-3 col-xs-3">
            <div class="service-block">
                <div class="service-content">
                    <div class="service-content">
                        <div class="row">
                            <div class="col-md-4">
                                <h1><a href="#" class="title">10000</a></h1>
                            </div>
                            <div class="col-lg-7">
                                <p>Laporan Masuk</p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-3 col-xs-3">
            <div class="service-block">
                <div class="service-content">
                    <div class="service-content">
                        <div class="row">
                            <div class="col-md-4">
                                <h1><a href="#" class="title">10000</a></h1>
                            </div>
                            <div class="col-lg-7">
                                <p>Informasi Tindakan Kriminal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero-section close -->
    <br><br><br>
    <br><br><br>
    <!-- service-section start -->
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title text-center">
                        <h1>Informasi Tindakan Kriminal Terbaru</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- service start -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="service-block">
                        <div class="service-img">
                            <a href="#"><img src="{{asset('images/service-img-1.jpg')}}" alt="Tour and Travel Agency - Responsive Website Template"></a>
                        </div>
                        <div class="service-content">
                            <h3><a href="#" class="title">Group Tour</a></h3>
                            <p>Scelerisque vitae velit e llamcorper plvinar esras sit amet odio et dolor por bibendum sit amet neceros.</p>
                            <div class="service-btn-link"><a href="domestic-tour.html" class="btn-link">Baca Selengkapnya...</a></div>
                            {{--<div><a href="international-tour.html" class="btn-link">International Tour</a></div>--}}
                        </div>
                    </div>
                </div>
                <!-- service close -->
                <!-- service start -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="service-block">
                        <div class="service-img">
                            <a href="#"><img src="{{asset('images/service-img-2.jpg')}}" alt="Tour and Travel Agency - Responsive Website Template"></a>
                        </div>
                        <div class="service-content">
                            <h3><a href="#" class="title">Couple Tour</a></h3>
                            <p>Pellentesque bibendum, ante et ornare viverra, ex neque lorem ipusm dtium vestibulum eros ut lacinia.</p>
                            <div class="service-btn-link"><a href="domestic-tour.html" class="btn-link">Baca Selengkapnya...</a></div>
                            {{--<div><a href="international-tour.html" class="btn-link">International Tour</a></div>--}}
                        </div>
                    </div>
                </div>
                <!-- service close -->
                <!-- service start -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="service-block">
                        <div class="service-img">
                            <a href="#"><img src="{{asset('images/service-img-3.jpg')}}" alt="Tour and Travel Agency - Responsive Website Template"></a>
                        </div>
                        <div class="service-content">
                            <h3><a href="#" class="title">Off Season Tour</a></h3>
                            <p>Donec pretium vestibulum eros ut Pellentesque bineque luctus orci in pharetra ante quam etestibul.</p>
                            <div class="service-btn-link"><a href="domestic-tour.html" class="btn-link">Baca Selengkapnya...</a></div>
                            {{--<div><a href="international-tour.html" class="btn-link">International Tour</a></div>--}}
                        </div>
                    </div>
                </div>
                <!-- service close -->
            </div>
        </div>
    </div>
    <!-- service-section close -->

    <!-- Testimonials-section start -->
    <div class="bg-default space-medium">
        <div class="container">
            <div class="row">
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title text-center">
                        <h1>Informasi dan Tips Tindakan Kriminal</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Testimonials-one-start -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="testimonial-block">
                        <div class="testimonial-img"><img src="{{asset('images/testimonial-img-1.jpg')}}" alt="Tour and Travel Agency - Responsive Website Template"></div>
                        <div class="testimonial-user-img"><img src="{{asset('images/testimonial-user-img-1.jpg')}}" alt="Tour and Travel Agency - Responsive Website Template" class="img-circle"></div>
                        <div class="testimonial-content">
                            <h4>Paul Hasburg</h4>
                            <span class="location">Kerala</span>
                            <div class="rating"> <span> <i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> </div>
                            <div>
                                <p class="testimonial-text">“I love this tour. We have enough time to fully experience the Kerala. I have the opportunity to show my region, thank you" </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonials-one-close -->
                <!-- Testimonials-two-start -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="testimonial-block">
                        <div class="testimonial-img"><img src="{{asset('images/testimonial-img-2.jpg')}}" alt="Tour and Travel Agency - Responsive Website Template"></div>
                        <div class="testimonial-user-img"><img src="{{asset('images/testimonial-user-img-2.jpg')}}" alt="Tour and Travel Agency - Responsive Website Template" class="img-circle"></div>
                        <div class="testimonial-content">
                            <h4>Plisa Moody</h4>
                            <span class="location">Kullu-manali</span>
                            <div class="rating"> <span> <i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> </div>
                            <div>
                                <p class="testimonial-text">“You were an excellent Travel Agency for us! It was invaluable trip to kullu-manali & You considered our unique needs, thank you ”</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonials-two-start -->
                <!-- Testimonials-three-start -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="testimonial-block">
                        <div class="testimonial-img"><img src="{{asset('images/testimonial-img-3.jpg')}}" alt="Tour and Travel Agency - Responsive Website Template"></div>
                        <div class="testimonial-user-img"><img src="{{asset('images/testimonial-user-img-3.jpg')}}" alt="Tour and Travel Agency - Responsive Website Template" class="img-circle"></div>
                        <div class="testimonial-content">
                            <h4>Christine Smith</h4>
                            <span class="location">Turkey</span>
                            <div class="rating"> <span> <i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> <span><i class="fa fa-star"></i> </span> </div>
                            <div>
                                <p class="testimonial-text">“Suspendisse vitaea enim dictum fringilla ullam interdum atelit id vestibulum TURKEY aecenas viverra risusit amet quam consectetu, thank you”</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonials-three-close -->

    <!-- about-section start -->
    <div class="bg-default space-medium">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title text-center">
                        <h1>Why Choose Our Travel Agency?</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- feature start -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="feature-block">
                        <div class="feature-icon"><i class="fa fa-building"></i></div>
                        <div class="feature-content">
                            <h3 class="feature-title">Accommodation</h3>
                            <p>Lorem ipsum dolor sitamet consec tetur adipiscing elied rs tristi quetur etullam corper viver.</p>
                        </div>
                    </div>
                </div>
                <!-- feature close -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="feature-block">
                        <div class="feature-icon"><i class="fa fa-plane"></i></div>
                        <div class="feature-content">
                            <h3 class="feature-title">Transportation</h3>
                            <p>Vivamus tincidunt varius arcu vitaeli ac fringilla nioamile just oetbi once bendum dapibus. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="feature-block">
                        <div class="feature-icon"><i class="fa fa-star"></i></div>
                        <div class="feature-content">
                            <h3 class="feature-title">Easy Trip Planning</h3>
                            <p>Apretium imperdie is nullam facili sis elit velest blandit ultri ciesras atvar ac ius lorem sitamet velerat. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-section close -->
    <!-- Destination-section-start -->
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title text-center">
                        <h1>Top Destinations</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- destination-one-start -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="destination-img">
                        <a href="#" class="imghover"><img src="{{asset('images/destination-1.jpg')}}" alt="Tour and Travel Agency - Responsive Website Template" class="img-responsive"></a>
                    </div>
                    <div class="destination-content">
                        <h3><a href="#" class="destination-title">Singapore</a></h3>
                    </div>
                </div>
                <!-- destination-one-close -->
                <!-- destination-two-start -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="destination-img imghover">
                        <a href="#" class="imghover"><img src="{{asset('images/destination-2.jpg')}}" alt="Tour and Travel Agency - Responsive Website Template" class="img-responsive"></a>
                    </div>
                    <div class="destination-content">
                        <h3><a href="#" class="destination-title">Greece</a></h3>
                    </div>
                </div>
                <!-- destination-two-close -->
                <!-- destination-three-start -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="destination-img imghover">
                        <a href="#"><img src="{{asset('images/destination-3.jpg')}}" alt="Tour and Travel Agency - Responsive Website Template" class="img-responsive"></a>
                    </div>
                    <div class="destination-content">
                        <h3><a href="#" class="destination-title">Thailand</a></h3>
                    </div>
                </div>
                <!-- destination-three-close -->
            </div>
        </div>
    </div>
    <!-- Destination-section-close -->

            </div>
        </div>
    </div>
@endsection