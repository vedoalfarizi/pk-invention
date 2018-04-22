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
                    <a href="index.html" alt="Tour and Travel Agency - Responsive Website Template"><img src="{{asset('images/pk.png')}}" style="width: 20%"/> </a>
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
                                <li><a href="{!! url('/cekkeamanan') !!}" title="Blog ">Cek Keamanan</a></li>

                                @if(Auth::check())
                                    @if(Auth::user()->role == 1)
                                        <li><a href="{!! route('profiles.index') !!}" title="Testimonials">Profil</a>
                                    @elseif(Auth::user()->role == 0)
                                        <li><a href="{!! route('home') !!}" title="Testimonials">Dashboard</a>
                                    @endif
                                @endif

                                <li><a href="{!! url('/lapor') !!}" title="Lapor" class="btn btn-warning"><font color="white">Lapor</font></a> </li>

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
        <div class="row" style="float: left">
            <!-- footer-about-start -->
            <br class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <strong style="color: white; font-size: 130%"><i class="fa fa-instagram"></i></strong> @pantau_kriminal<p/><br/>
                    <strong style="color: white; font-size: 130%"><i class="fa fa-envelope"></i></strong> @info@pk.com<p/>
                    <strong style="color: white; font-size: 130%"><i class="fa fa-map-marker"></i></strong>
                    Jurusan Sistem Informasi<br/>
                    &emsp;Fakultas Teknologi Informasi<br/>
                    &emsp;Universitas Andalas<br/>
                    &emsp;Limau Manis, Pauh, Padang<br/>
                    <p/>
                </div>
            </div>
            <!-- footer-about-close -->
            <!-- footer-location-start -->
        <div style="float: right">
            <table>
                <tr><td colspan="3"><center><b>Kirim Masukan</b></center</td></tr>
                <tr><td>&nbsp</td></tr>
                <tr>
                    <td>E-mail</td>
                    <td>:</td>
                    <td><input type="text" style="width: 100%"></td>
                </tr>
                <tr><td>&nbsp</td></tr>
                <tr>
                    <td>Saran</td>
                    <td>:</td>
                    <td><textarea rows="6" cols="60"></textarea> </td>
                </tr>
            </table>
        </div>
            <!-- footer-social-close -->
        </div>
    </div>
</div>
<!-- tiny-footer-start -->
<div class="tiny-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">© 2018. ASIMETR15</div>
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


