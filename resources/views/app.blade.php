@php
    $menus = \App\Models\perkara::get();
@endphp
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.0&appId=1315489981894110&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- header-section start -->
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-4 hidden-sm col-sm-12">
                <div class="call-info">
                    <p class="call-text">Ada yang ingin ditanyakan? Hubungi kita:<strong><a target="_blank" href="https://www.instagram.com/asimetr15/">ASIMETR15</a></strong></p>
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
                    <a href="{!! url('/')!!}" alt="PK"><img src="{{asset('images/pk.png')}}" style="width: 20%"/> </a>
                </div>
                <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
                    <div class="navigation">
                        <div id="navigation">
                            <ul>
                                <li class="active"><a href="{!! url('/') !!}" title="Home">Beranda</a></li>
                                {{--<li><a href="about.html" title="About us">Informasi</a> </li>--}}
                                <li class="has-sub"><a href="{!!route('infos.index') !!}" title="Tours">Info & Tips</a>
                                    <ul>
                                        @foreach($menus as $menu)
                                        <li><a href="{!! url('infos/cat/'.$menu->id) !!}">{!! $menu->nama !!}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{!! url('/cekkeamanan') !!}" title="Blog ">Cek Keamanan</a></li>

                                @if(Auth::check())
                                    @if(Auth::user()->role == 1)
                                        <li><a href="{!! url('/user/profil') !!}" title="Testimonials">Profil</a>
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

<div class="footer">
    <div class="container">
        <div class="row">
            <!-- footer-about-start -->
            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title ">Tentang Kami</h3>
                    <p>PK (Pantau Kriminalitas) merupakan platform berbasis website yang membantu pemerintah dalam memantau
                        kriminilitas yang terjadi di suatu daerah serta sebagai sarana berbagi informasi dan pelaporan
                        tindakan kejahatan oleh masyarakat.</p>
                </div>
            </div>
            <!-- footer-about-close -->
            <!-- footer-location-start -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Lokasi Kami</h3>
                    <p><i class="fa fa-map-marker"></i>  Jurusan Sistem Informasi, Fakultas Teknologi Informasi, Universitas Andalas</p>
                </div>
            </div>
            <!-- footer-location-close -->
            <!-- footer-contact-start -->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                <div class="footer-widget">
                    <h3 class="footer-title">Kontak Kami</h3>
                    <div class="contact-info">
                        <ul>
                            <li><a target="_blank" href="https://www.linkedin.com/in/vedo-alfarizi-56a04b145/">Vedo Alfarizi</a></li>
                            <li><a>ridhodarman@gmail.com</a></li>
                            <li><a>dartikaanie@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- footer-contact-close -->
        </div>
    </div>
</div>
<!-- tiny-footer-start -->
<div class="tiny-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">© {!! date('Y') !!}. ASIMETR15</div>
        </div>
    </div>
    <!-- tiny-footer-start -->
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/menumaker.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('js/jquery.sticky.js')}}"></script>
<script type="text/javascript" src="{{asset('js/sticky-header.js')}}"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</body>

</html>


