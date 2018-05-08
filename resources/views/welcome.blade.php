@extends('app')
@section('content')
    <meta name="description" content="map created using amCharts pixel map generator" />

    <!-- amCharts javascript sources -->
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/maps/js/indonesiaLow.js"></script>

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
            "backgroundColor": "rgba(255,255,255,1)",
            "dataProvider": {
                "map": "indonesiaLow",
                "getAreasFromMap": true,
                "images": [
                    {
                        "top": 40,
                        "left": 60,
                        "width": 80,
                        "height": 40,
                        "pixelMapperLogo": true,
                        "imageURL": "http://pixelmap.amcharts.com/static/img/logo-black.svg",
                        "url": "http://www.amcharts.com"
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
                @php
                    $infos = \App\Models\info::orderBy('created_at', 'desc')->limit(3)->get();
                @endphp
                @foreach($infos as $info)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="service-block">
                            <div class="service-img">
                                <a href="{!! route('infos.show' , [$info->id]) !!}"><img src="{!! url('storage/'.$info->file_foto) !!}" alt="Foto" style="height :200px"></a>
                            </div>
                            <div class="service-content">
                                <h3><a href="{!! route('infos.show' , [$info->id]) !!}" class="title">[{!! strtoupper($info->perkara->nama)!!}]<br>{!! $info->judul !!}</a></h3>
                                <div class="tour-meta"> <span class="tour-meta-icon"><i class="fa fa-map-marker"></i></span><span class="tour-meta-text">{!! $info->lat !!}|{!! $info->long !!}</span> <span class="tour-meta-text"><br></span> <span class="tour-meta-icon"><i class="fa fa-calendar"></i></span><span class="tour-meta-text">{!! $info->created_at->format('d M Y') !!}</span> </div>
                                <div class="tour-details-btn"> <span><a href="{!! route('infos.show' , [$info->id]) !!}" class="btn btn-primary">Baca Selengkapnya</a></span> </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row text-center">
                <a href="{!! route('infos.index') !!}" class="text-center btn btn-primary">Lihat Semua</a>
            </div>
        </div>
    </div>
    <!-- service-section start -->
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
                <!-- service start -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
                </div>

                <script type="text/javascript">

                    Highcharts.chart('container', {
                        chart: {
                            type: 'bar'
                        },
                        title: {
                            text: 'Daerah Paling Rawan Kriminal'
                        },
                        subtitle: {
                            text: '2018'
                        },
                        xAxis: {
                            categories: ['.','Sumatera Barat', 'Sumatera Utara', 'Sulawesi Selatan', 'Jakarta', 'Jawa Barat'],
                            title: {
                                text: null
                            }
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Population (millions)',
                                align: 'high'
                            },
                            labels: {
                                overflow: 'justify'
                            }
                        },
                        tooltip: {
                            valueSuffix: ' millions'
                        },
                        plotOptions: {
                            bar: {
                                dataLabels: {
                                    enabled: true
                                }
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'top',
                            x: -40,
                            y: 80,
                            floating: true,
                            borderWidth: 1,
                            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                            shadow: true
                        },
                        credits: {
                            enabled: false
                        },
                        series: [{
                            name: 'angka krimintalitas',
                            data: [0,3, 0, 0, 0, 0]
                        }]
                    });
                </script>
                <!-- service close -->
                <!-- service start -->

                <!-- service close -->
                <!-- service start -->

                <!-- service close -->
            </div>
        </div>
    </div>
    <!-- service-section close -->

    <!-- hero-section start -->
    <div class="bg-default space-medium">
        <div class="container">
            <div class="row">
                <div id="map" style="width: 100%; height: 613px;"></div>
            </div>
            <div class="row">
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title text-center">
                        <h1 class="hero-title text-center"> Tingkatan Kriminalitas</h1>
                        <a style="float: left">Rendah</a> <a style="float: right">Tinggi</a> <img src="{{asset('images/bar.png')}}"/><br/>.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @php
                        $laporanSelesai = \App\Models\laporan::where('status_laporan', '=', 3)->count();
                        $laporanMasuk = \App\Models\laporan::get()->count();
                        $infoMasuk = \App\Models\info::get()->count();
                    @endphp
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="service-block">
                                <div class="service-content">
                                    <h3 class="text-center"><a class="title">{!! $laporanSelesai !!}</a></h3>
                                    <div class="service-btn-link text-center"><a class="btn-link">Tindakan Kriminal Yang Terselesaikan</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="service-block">
                                <div class="service-content">
                                    <h3 class="text-center"><a class="title">{!! $laporanMasuk !!}</a></h3>
                                    <div class="service-btn-link text-center"><a class="btn-link">Laporan Masuk</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="service-block">
                                <div class="service-content">
                                    <h3 class="text-center"><a class="title">{!! $infoMasuk !!}</a></h3>
                                    <div class="service-btn-link text-center"><a class="btn-link">Informasi Tindakan Kriminal</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero-section close -->

@endsection