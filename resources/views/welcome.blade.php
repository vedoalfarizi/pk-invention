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
                        "title": "Aceh<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(26,88,217,1)"
                    },
                    {
                        "id": "ID-BA",
                        "title": "Bali<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(163,98,89,1)"
                    },
                    {
                        "id": "ID-BE",
                        "title": "Bengkulu<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(25,70,165,1)"
                    },
                    {
                        "id": "ID-BT",
                        "title": "Banten<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(139,147,165,1)"
                    },
                    {
                        "id": "ID-GO",
                        "title": "Gorontalo<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(155,163,89,1)"
                    },
                    {
                        "id": "ID-JA",
                        "title": "Jambi<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(22,36,66,1)"
                    },
                    {
                        "id": "ID-JB",
                        "title": "Jawa Barat<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(126,140,170,1)"
                    },
                    {
                        "id": "ID-JI",
                        "title": "Jawa Timur<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(14,48,118,1)"
                    },
                    {
                        "id": "ID-JT",
                        "title": "Jawa Tengah<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(27,75,173,1)"
                    },
                    {
                        "id": "ID-KB",
                        "title": "Kalimantan Barat<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(18,43,94,1)"
                    },
                    {
                        "id": "ID-KI",
                        "title": "Kalimantan Timur<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(70,208,174,0.8)"
                    },
                    {
                        "id": "ID-KS",
                        "title": "Kalimantan Selatan<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(163,89,143,1)"
                    },
                    {
                        "id": "ID-KT",
                        "title": "Kalimantan Tengah<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(70,208,174,0.8)"
                    },
                    {
                        "id": "ID-KU",
                        "title": "Kalimantan Utara<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(54,98,189,1)"
                    },
                    {
                        "id": "ID-LA",
                        "title": "Lampung<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(138,148,168,1)"
                    },
                    {
                        "id": "ID-MA",
                        "title": "Maluku<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(10,18,35,1)"
                    },
                    {
                        "id": "ID-MU",
                        "title": "Maluku Utara<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(18,33,62,1)"
                    },
                    {
                        "id": "ID-NB",
                        "title": "Nusa Tenggara Barat<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(10,24,54,1)"
                    },
                    {
                        "id": "ID-NT",
                        "title": "Nusa Tenggara Timur<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(28,86,210,1)"
                    },
                    {
                        "id": "ID-PA",
                        "title": "Papua<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(4,15,38,1)"
                    },
                    {
                        "id": "ID-PB",
                        "title": "Papua Barat<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(158,89,163,1)"
                    },
                    {
                        "id": "ID-RI",
                        "title": "Riau<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(70,208,174,0.8)"
                    },
                    {
                        "id": "ID-SA",
                        "title": "Sulawesi Utara<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(44,87,177,1)"
                    },
                    {
                        "id": "ID-SB",
                        "title": "Sumatera Barat<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(27,96,241,1)"
                    },
                    {
                        "id": "ID-SG",
                        "title": "Sulawesi Tenggara<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(43,80,156,1)"
                    },
                    {
                        "id": "ID-SN",
                        "title": "Sulawesi Selatan<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(10,21,43,1)"
                    },
                    {
                        "id": "ID-SR",
                        "title": "Sulawesi Barat<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(20,78,201,1)"
                    },
                    {
                        "id": "ID-SS",
                        "title": "Sumatera Selatan<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(70,208,174,0.8)"
                    },
                    {
                        "id": "ID-ST",
                        "title": "Sulawesi Tengah<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(9,13,21,1)"
                    },
                    {
                        "id": "ID-SU",
                        "title": "Sumatera Utara<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(17,31,59,1)"
                    },
                    {
                        "id": "ID-YO",
                        "title": "Yogyakarta<br/><small>Total Kriminalitas:333<small>",
                        "color": "rgba(48,61,41,1)"
                    },
                    {
                        "id": "TL",
                        "title": "Timor-Leste",
                        "color": "rgba(33,128,40,1)"
                    },
                    {
                        "id": "MY-12",
                        "title": "Sabah",
                        "color": "rgba(38,91,203,1)"
                    },
                    {
                        "id": "MY-13",
                        "title": "Sarawak",
                        "color": "rgba(70,208,174,0.8)"
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

    <!-- hero-section start -->



    <div id="map" style="width: 100%; height: 613px;"></div><center>
    <div class="hero-section-caption nopadding" style="width: 90%">
        <h1 class="hero-title"><center> Tingkatan Kriminalitas </center></h1>
        <a style="float: left">Rendah</a> <a style="float: right">Tinggi</a> <img src="{{asset('images/bar.png')}}"/><br/>. </div></center>

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
                            categories: ['.','Jawa Barat', 'Sumatera Utara', 'Sulawesi Selatan', 'Jakarta', 'Sumatera Barat'],
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
                            data: [0,924, 800, 635, 203, 96]
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
                    <div class="service-block">
                        <div class="service-img">
                            <a href="#"><img src="{{asset('images/begal.png')}}" alt="Tour and Travel Agency - Responsive Website Template"></a>
                        </div>
                        <div class="service-content">
                            <p>Tips aman berkendara ketika malam hari</p>
                            <div class="service-btn-link"><a href="domestic-tour.html" class="btn-link">Baca Selengkapnya...</a></div>
                            {{--<div><a href="international-tour.html" class="btn-link">International Tour</a></div>--}}
                        </div>
                    </div>
                </div>
                <!-- Testimonials-one-close -->
                <!-- Testimonials-two-start -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="service-block">
                        <div class="service-img">
                            <a href="#"><img src="{{asset('images/maling.jpg')}}" alt="Tour and Travel Agency - Responsive Website Template"></a>
                        </div>
                        <div class="service-content">
                            <p>Cara mencegah ponsel agar tidak mudah dicuri</p>
                            <div class="service-btn-link"><a href="domestic-tour.html" class="btn-link">Baca Selengkapnya...</a></div>
                            {{--<div><a href="international-tour.html" class="btn-link">International Tour</a></div>--}}
                        </div>
                    </div>
                </div>
                <!-- Testimonials-two-start -->
                <!-- Testimonials-three-start -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="service-block">
                        <div class="service-img">
                            <a href="#"><img src="{{asset('images/parkiran.jpg')}}" alt="Tour and Travel Agency - Responsive Website Template"></a>
                        </div>
                        <div class="service-content">
                            <p>Cara menjaga helm agar tetap aman di parkiran</p>
                            <div class="service-btn-link"><a href="domestic-tour.html" class="btn-link">Baca Selengkapnya...</a></div>
                            {{--<div><a href="international-tour.html" class="btn-link">International Tour</a></div>--}}
                        </div>
                    </div>
                </div>
                <center>
                    <button class="btn btn-primary">Lihat Semua</button></center>
                <!-- Testimonials-three-close -->

    <!-- about-section start -->


    <!-- Destination-section-close -->

            </div>
        </div>
    </div>
@endsection