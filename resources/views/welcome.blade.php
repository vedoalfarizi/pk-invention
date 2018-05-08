@extends('app')
@section('content')
    <meta name="description" content="map created using amCharts pixel map generator" />

    <!-- amCharts javascript sources -->
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/maps/js/indonesiaLow.js"></script>
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- amCharts javascript code -->
    <script type="text/javascript">
        AmCharts.makeChart("map",{
            "type": "map",
            "pathToImages": "http://www.amcharts.com/lib/3/images/",
            "addClassNames": true,
            "fontSize": 15,
            "color": "#000000",
            "projection": "mercator",
            "backgroundAlpha": 1,
            "backgroundColor": "white",
            "dataProvider": {
                "map": "indonesiaLow",
                "getAreasFromMap": true,
                "images": [
                    {
                        "top": 40,
                        "left": 60,
                        "width": 80,
                        "height": 10,
                        "pixelMapperLogo": false,

                    }
                ],
                "areas": [
                    {
                        "id": "ID-AC",
                        "title": "Aceh<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(186, 232, 255, 0.6)"
                    },
                    {
                        "id": "ID-BA",
                        "title": "Bali<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(186, 232, 255, 0.6)"
                    },
                    {
                        "id": "ID-BE",
                        "title": "Bengkulu<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(186, 232, 255, 0.6)"
                    },
                    {
                        "id": "ID-BT",
                        "title": "Banten<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-GO",
                        "title": "Gorontalo<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-JA",
                        "title": "Jambi<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-JB",
                        "title": "Jawa Barat<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-JI",
                        "title": "Jawa Timur<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-JT",
                        "title": "Jawa Tengah<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-KB",
                        "title": "Kalimantan Barat<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-KI",
                        "title": "Kalimantan Timur<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-KS",
                        "title": "Kalimantan Selatan<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-KT",
                        "title": "Kalimantan Tengah<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-KU",
                        "title": "Kalimantan Utara<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-LA",
                        "title": "Lampung<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-MA",
                        "title": "Maluku<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-MU",
                        "title": "Maluku Utara<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-NB",
                        "title": "Nusa Tenggara Barat<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-NT",
                        "title": "Nusa Tenggara Timur<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-PA",
                        "title": "Papua<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-PB",
                        "title": "Papua Barat<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-RI",
                        "title": "Riau<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-SA",
                        "title": "Sulawesi Utara<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-SB",
                        "title": "Sumatera Barat<br/><small>Total Kriminalitas:3<small>",
                        "color": "rgba(27,96,241,1)"
                    },
                    {
                        "id": "ID-SG",
                        "title": "Sulawesi Tenggara<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-SN",
                        "title": "Sulawesi Selatan<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-SR",
                        "title": "Sulawesi Barat<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-SS",
                        "title": "Sumatera Selatan<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-ST",
                        "title": "Sulawesi Tengah<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-SU",
                        "title": "Sumatera Utara<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "ID-YO",
                        "title": "Yogyakarta<br/><small>Total Kriminalitas:0<small>",
                        "color": "rgba(198, 227, 255, 0.6)"
                    },
                    {
                        "id": "TL",
                        "title": "Timor-Leste",
                        "color": "rgba(0,0,0,0)"
                    },
                    {
                        "id": "MY-12",
                        "title": "Sabah",
                        "color": "rgba(0,0,0,0)"
                    },
                    {
                        "id": "MY-13",
                        "title": "Sarawak",
                        "color": "rgba(0,0,0,0)"
                    }
                ]
            },
            "balloon": {
                "horizontalPadding": 15,
                "borderAlpha": 0,
                "borderThickness": 1,
                "verticalPadding": 15
            },
            "areasSettings": {
                "color": "rgba(89,113,163,1)",
                "outlineColor": "rgba(255,255,255,1)",
                "rollOverOutlineColor": "rgba(255,255,255,1)",
                "rollOverBrightness": 20,
                "selectedBrightness": 20,
                "selectable": true,
                "unlistedAreasAlpha": 0,
                "unlistedAreasOutlineAlpha": 0
            },
            "imagesSettings": {
                "alpha": 1,
                "color": "rgba(89,113,163,1)",
                "outlineAlpha": 0,
                "rollOverOutlineAlpha": 0,
                "outlineColor": "rgba(255,255,255,1)",
                "rollOverBrightness": 20,
                "selectedBrightness": 20,
                "selectable": true
            },
            "linesSettings": {
                "color": "rgba(89,113,163,1)",
                "selectable": true,
                "rollOverBrightness": 20,
                "selectedBrightness": 20
            },
            "zoomControl": {
                "zoomControlEnabled": true,
                "homeButtonEnabled": false,
                "panControlEnabled": false,
                "right": 38,
                "bottom": 30,
                "minZoomLevel": 0.25,
                "gridHeight": 100,
                "gridAlpha": 0.1,
                "gridBackgroundAlpha": 0,
                "gridColor": "#FFFFFF",
                "draggerAlpha": 1,
                "buttonCornerRadius": 2
            }
        });
    </script>

    <script src="{{asset('code/highcharts.js')}}"></script>
    <script src="{{asset('code/modules/exporting.js')}}"></script>
    {{--src="{{asset('images/service-img-1.jpg')}}"--}}

    <!-- Testimonials-section start -->
    <div class="row" style="background-color: white">
    <div class="col-md-12">
        <div id="map" style="width: 100%; height: 400px;"></div>
        <div class="pull-right" style="background-color: white; margin-left: 60%"> <small>Rendah</small>  <img style="width: 60%; " src="{{asset('images/bar.png')}}"/><small> Tinggi</small></div>
        <br>
    </div>
        <div class="col-md-12">

            <br>
            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @php
                    $laporanSelesai = \App\Models\laporan::where('status_laporan', '=', 3)->count();
                    $laporanMasuk = \App\Models\laporan::get()->count();
                    $infoMasuk = \App\Models\info::get()->count();
                @endphp
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="service-block" style="background-color: #dff0d8;">
                            <div class="service-content" >
                                <h1 class="text-center" style="font-size: xx-large">{!! $laporanSelesai !!}</h1>
                                <div class="small col-lg-12 text-center">Tindakan Kriminal Yang Terselesaikan</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="service-block" style="background-color:#dff0d8;">
                            <div class="service-content">
                                <h1 class="text-center" style="font-size: xx-large">{!! $laporanMasuk !!}</h1>
                                <div class="small col-lg-12 text-center">Laporan Masuk</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="service-block" style="background-color:#dff0d8;">
                            <div class="service-content">
                                <h1 class="text-center" style="font-size: xx-large">{!! $infoMasuk !!}</h1>
                                <div class="small col-lg-12 text-center">Informasi Tindakan Kriminal</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- service-section start -->
    <div class="bg-default space-medium" >
        <div class="container" >

            <div class="row" >

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" >
                    <br> <br> <br>
                    <h2>Mari Berantas Tindakan Kriminal !</h2>
                    <h3>#PantauKriminal</h3>
                    <p>Simak Berita Tindakan Kriminal di Pantau Kriminal</p>
                   <div style="padding-left: 25%"><a href="" class="text-center btn btn-default">Lihat Semua...</a></div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" >

                        <div id="myCarousel" class="carousel slide col-lg-12 col-md-12 col-sm-12 col-xs-12"  data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{asset('/images/pk.png')}}" alt="Los Angeles" style="width:80%; height: 250px;">
                                    <label style="font-size: medium"> BERITA INI JUDUL BERITA YANG AKAN DITAMPILKAN</label>
                                    <p style="background-color: white;">MALANG - Buser Satreskrim Polres Malang membekuk Udik Cahyono, warga Desa Blayu, Kecamatan Wajak. Pria 38 tahun itu, ...</p>
                                </div>

                                <div class="item">
                                    <img src="{{asset('/images/pk.png')}}" alt="Los Angeles" style="width:80%; height: 250px;">
                                    <label style="font-size: medium"> BERITA INI JUDUL BERITA YANG AKAN DITAMPILKAN</label>
                                    <p style="background-color: white;">MALANG - Buser Satreskrim Polres Malang membekuk Udik Cahyono, warga Desa Blayu, Kecamatan Wajak. Pria 38 tahun itu, ...</p>

                                </div>

                                <div class="item">
                                    <img src="{{asset('/images/pk.png')}}" alt="Los Angeles" style="width:80%; height: 250px;">
                                    <label style="font-size: medium"> BERITA INI JUDUL BERITA YANG AKAN DITAMPILKAN</label>
                                    <p style="background-color: white;">MALANG - Buser Satreskrim Polres Malang membekuk Udik Cahyono, warga Desa Blayu, Kecamatan Wajak. Pria 38 tahun itu, ...</p>

                                </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    <!-- service-section close -->


    <!-- hero-section close -->
    <div class="space-medium">

        <div class="container">
            <div class="row">
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title text-center">
                        <h1>Informasi Tindakan Kriminal</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                    $infos = \App\Models\info::orderBy('created_at', 'desc')->limit(3)->get();
                @endphp
                @foreach($infos as $info)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="service-block" style="height: 500px">
                            <div class="service-img">
                                <a href="{!! route('infos.show' , [$info->id]) !!}"><img src="{!! url('storage/'.$info->file_foto) !!}" alt="Foto" style="height :200px"></a>
                            </div>
                            <div class="service-content">
                                <h3><a href="{!! route('infos.show' , [$info->id]) !!}" class="title">[{!! strtoupper($info->perkara->nama)!!}]<br>{!! $info->judul !!}</a></h3>
                                <div class="tour-meta"> <span class="tour-meta-icon"><i class="fa fa-map-marker"></i></span><span class="tour-meta-text">{!! $info->lat !!}|{!! $info->long !!}</span> <span class="tour-meta-text"><br></span> <span class="tour-meta-icon"><i class="fa fa-calendar"></i></span><span class="tour-meta-text">{!! $info->created_at->format('d M Y') !!}</span> </div>
                                <div class="tour-details-btn" > <span><a href="{!! route('infos.show' , [$info->id]) !!}" class="btn btn-primary" style="position:absolute; bottom: 50px;right: 50px;">Baca Selengkapnya</a></span> </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row pull-right">
                <a href="{!! route('infos.index') !!}" class="text-center btn btn-primary">Lihat Semua . . .</a>
            </div>
        </div>
    </div>

    <!-- hero-section close -->
    <div class="bg-success space-medium">

        <div class="container">
            <div class="row">
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title text-center">
                        <h1>Kenapa berbagi Informasi dengan Pantau Kriminal?</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <img src="{{asset('/images/pk.png')}}" style="width: 80%">
                </div>
                <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <br><br>
                     <ul class="text-18 ulist-bullet ulist-bullet--blue">
                            <li>
                                .<strong>Cepat,</strong> buat halaman campaign dalam 5 menit
                            </li>
                         <br>
                            <li>
                                .<strong>Transparan,</strong> donasi tercatat real-time dan bisa dilihat siapa saja
                            </li>
                         <br>
                            <li>
                                .<strong>Mudah,</strong> terima donasi via transfer bank dan kartu kredit
                            </li>
                         <br>
                            <li>
                                .<strong>Fleksibel,</strong> cairkan donasi kapan saja
                            </li>
                        </ul>
                 </div>
            </div>
        </div>

    </div>
@endsection