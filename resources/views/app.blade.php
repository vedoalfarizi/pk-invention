<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Want to start your travel agency online and need website for your travel business? Start with travel agency responsive website template. Its absolutely free.">
    <meta name="keywords" content="travel, tour, tourism, honeymoon pacakage, summer trip, exotic vacation, destination, international, domestic website template, holiday, travel agecny responsive website template">
    <title>Pantau Kriminal</title>
    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Style CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- header-section start -->
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-4 hidden-sm col-sm-12">
                <div class="call-info">
                    <p class="call-text">Ada yang ingin ditanyakan? Hubungi kita:<strong>0000-000-0000</strong></p>
                </div>
            </div>
            <div class="col-md-8 hidden-sm hidden-xs">
                <div class="social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-wrapper">
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-2 col-sm-12 col-xs-12">
                    <a href="index.html"><img src="{{asset('images/logo.png')}}" alt="Tour and Travel Agency - Responsive Website Template"></a>
                </div>
                <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
                    <div class="navigation">
                        <div id="navigation">
                            <ul>
                                <li class="active"><a href="{!! url('/') !!}" title="Home">Beranda</a></li>
                                {{--<li><a href="about.html" title="About us">Informasi</a> </li>--}}
                                <li class="has-sub"><a href="{!!route('infos.index') !!}" title="Tours">Info & Tips</a>
                                    <ul>
                                        <li><a href="domestic-tour.html" title="Group Tours">Pencurian</a></li>
                                        <li><a href="international-tour.html" title="Couple Tours">Pembunuhan</a></li>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="blog-default.html" title="Blog ">Peta</a>
                                    <ul>
                                        <li><a href="blog-default.html" title="Blog">Blog Default</a></li>
                                        <li><a href="blog-single.html" title="Blog Single ">Peta</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.html" title="Contact Us">Contact Us</a> </li>

                                @if(Auth::check())
                                    @if(Auth::user()->role == 1)
                                        <li><a href="{!! route('profiles.index') !!}" title="Testimonials">Profil</a>
                                    @elseif(Auth::user()->role == 0)
                                        <li><a href="{!! route('home') !!}" title="Testimonials">Dashboard</a>
                                    @endif
                                @endif

                                @if(!Auth::check())
                                    <li><a href="{!! url('/login') !!}" title="Styleguide">Masuk</a></li>
                                @else
                                    <li><a href="{!! url('/logout') !!}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Keluar
                                        </a></li>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header-section close -->

@yield('content')

<!-- footer start -->
<div class="footer">
    <div class="container">
        <div class="row">
            <!-- footer-about-start -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title ">About us</h3>
                    <p>Booking, reviews and advices on hotels, resorts, flights, vacation rentals, travel packages, and lots more in our travel agency !</p>
                    <a href="#" class="footer-link">More about us</a></div>
            </div>
            <!-- footer-about-close -->
            <!-- footer-location-start -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Our Locations</h3>
                    <ul class="arrow arrow-chevron-circle-right">
                        <li><a href="#">Ahmedabad</a></li>
                        <li><a href="#">Mumbai</a></li>
                        <li><a href="#">Surat</a></li>
                        <li><a href="#">Jamnagar</a></li>
                        <li><a href="#">Bhuj</a></li>
                    </ul>
                </div>
            </div>
            <!-- footer-location-close -->
            <!-- footer-contact-start -->
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 ">
                <div class="footer-widget">
                    <h3 class="footer-title">Contact Info</h3>
                    <div class="contact-info">
                        <ul>
                            <li>2867 University Street Ahmedabad, WA 98052</li>
                            <li>252-386-7004 </li>
                            <li>info@yourwebsitedomian.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- footer-contact-close -->
            <!-- footer-social-start -->
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12 ">
                <div class="footer-widget">
                    <h3 class="footer-title">Follow us on</h3>
                    <div class="footer-social">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- footer-social-close -->
        </div>
    </div>
</div>
<!-- tiny-footer-start -->
<div class="tiny-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">© 2020. All Rights Reserved. Privacy Policy</div>
        </div>
    </div>
    <!-- tiny-footer-start -->
</div>
<!-- footer close -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/menumaker.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('js/jquery.sticky.js')}}"></script>
<script type="text/javascript" src="{{asset('js/sticky-header.js')}}"></script>
</body>

</html>


