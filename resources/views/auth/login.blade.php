<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pantauan Kriminal</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
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
                                    <li class="active"><a href="index.html" title="Home">Beranda</a></li>
                                    {{--<li><a href="about.html" title="About us">Informasi</a> </li>--}}
                                    <li class="has-sub"><a href="tours.html" title="Tours">Informasi</a>
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
                                    <li><a href="testimonials.html" title="Testimonials">Profil</a>
                                    <li><a href="contact-us.html" title="Contact Us">Contact Us</a> </li>
                                    <li><a href="styleguide.html" title="Styleguide">Masuk | Register </a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="hero-section-caption pinside40 text-center">
                        <form method="post" action="{{ url('/login') }}">
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="regist-label" for="email">Email</label>
                                        <input id="email" name="email" type="email" class="form-control">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong class="regist-label">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="regist-label" for="email">Password</label>
                                        <input id="password" name="password" type="password" class="form-control">
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong class="regist-label">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <button id="singlebutton" name="singlebutton" class="btn btn-primary btn-sm" type="submit">Masuk</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <a href="{{ url('/register') }}" class="reply-link">Register a new membership</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/menumaker.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('js/jquery.sticky.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sticky-header.js')}}"></script>
</body>
</html>
