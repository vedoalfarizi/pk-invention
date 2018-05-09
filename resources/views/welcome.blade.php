@extends('app')
@section('content')
    <meta name="description" content="map created using amCharts pixel map generator" />

    <!-- amCharts javascript sources -->

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    @php
        $infos = \App\Models\info::all(['lat', 'long']);

        $aceh = \App\Models\info::where('provinsi', 'Aceh')->count();
        $sumut = \App\Models\info::where('provinsi', 'Sumatera Utara')->count();
        $riau = \App\Models\info::where('provinsi', 'Riau')->count();
        $kepri = \App\Models\info::where('provinsi', 'Kepulauan Riau')->count();
        $sumbar = \App\Models\info::where('provinsi', 'Sumatera Barat')->count();
        $bengkulu = \App\Models\info::where('provinsi', 'Bengkulu')->count();
        $jambi = \App\Models\info::where('provinsi', 'Jambi')->count();
        $babel = \App\Models\info::where('provinsi', 'Bangka Belitung')->count();
        $sumsel = \App\Models\info::where('provinsi', 'Sumatera Selatan')->count();
        $lampung = \App\Models\info::where('provinsi', 'Lampung')->count();

        $banten = \App\Models\info::where('provinsi', 'Banten')->count();
        $jakarta = \App\Models\info::where('provinsi', 'Daerah Khusus Ibukota Jakarta')->count();
        $jabar = \App\Models\info::where('provinsi', 'Jawa Barat')->count();
        $jateng = \App\Models\info::where('provinsi', 'Jawa Tengah')->count();
        $jatim = \App\Models\info::where('provinsi', 'Jawa Timur')->count();
        $yogya = \App\Models\info::where('provinsi', 'Daerah Istimewa Yogyakarta')->count();

        $kalbar = \App\Models\info::where('provinsi', 'Kalimantan Barat')->count();
        $kalteng = \App\Models\info::where('provinsi', 'Kalimantan Tengah')->count();
        $kalsel = \App\Models\info::where('provinsi', 'Kalimantan Selatan')->count();
        $kaltim = \App\Models\info::where('provinsi', 'Kalimantan Timur')->count();
        $kalut = \App\Models\info::where('provinsi', 'Kalimantan Utara')->count();

        $sulbar = \App\Models\info::where('provinsi', 'Sulawesi Barat')->count();
        $sulsel = \App\Models\info::where('provinsi', 'Sulawesi Selatan')->count();
        $sulbar = \App\Models\info::where('provinsi', 'Sulawesi Barat')->count();
        $sulteng = \App\Models\info::where('provinsi', 'Sulawesi Tengah')->count();
        $sultra = \App\Models\info::where('provinsi', 'Sulawesi Tenggara')->count();
        $sulut = \App\Models\info::where('provinsi', 'Sulawesi Utara')->count();
        $gorontalo = \App\Models\info::where('provinsi', 'Gorontalo')->count();

        $bali = \App\Models\info::where('provinsi', 'Bali')->count();
        $ntb = \App\Models\info::where('provinsi', 'Nusa Tenggara Barat')->count();
        $ntt = \App\Models\info::where('provinsi', 'Nusa Tenggara Timur')->count();

        $maluku = \App\Models\info::where('provinsi', 'Maluku')->count();
        $malut = \App\Models\info::where('provinsi', 'Maluku Utara')->count();

        $papua = \App\Models\info::where('provinsi', 'Papua')->count();
        $pabar = \App\Models\info::where('provinsi', 'Papua Barat')->count();

    @endphp

    <!-- amCharts javascript code -->


    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="http://code.highcharts.com/maps/highmaps.js"></script>
    <script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js"></script>
    <script type="text/javascript" src="http://code.highcharts.com/mapdata/countries/id/id-all.js"></script>
    <style type="text/css">
        .container2 { margin: auto; padding: 1%; border: 2px solid #DBDBDB; }
    </style>




    <div class="container2">
        <div class="grafik" style="height: 450px"></div>
        <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
            <h3 ><strong style="color: #4d8638; font-size: xx-large">Pantau Kriminalitas </strong> </h3>
            <h2>Ceritakan dan lapor informasi tindakan kriminal atasi tindakan  berulang </h2>
        </div>
    </div>
                @php
                    $laporanSelesai = \App\Models\laporan::where('status_laporan', '=', 3)->count();
                    $laporanMasuk = \App\Models\laporan::get()->count();
                    $infoMasuk = \App\Models\info::get()->count();
                @endphp
            <div class="row" style="margin-left: 4%; margin-right: 0%">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="service-block" style="background-color: #dff0d8; margin-left: -50px">
                        <div class="service-content" >
                            <h1 class="text-center" style="font-size: xx-large">{!! $laporanSelesai !!}</h1>
                            <div class="small col-lg-12 text-center" style="margin-bottom: -22px">Tindakan Kriminal Yang Terselesaikan</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="service-block" style="background-color:#dff0d8; margin-left: -50px">
                        <div class="service-content">
                            <h1 class="text-center" style="font-size: xx-large;">{!! $laporanMasuk !!}</h1>
                            <div class="small col-lg-12 text-center" style="margin-bottom: 20px">Laporan Masuk</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="service-block" style="background-color:#dff0d8; margin-left: -50px">
                        <div class="service-content">
                            <h1 class="text-center" style="font-size: xx-large">{!! $infoMasuk !!}</h1>
                            <div class="small col-lg-12 text-center">Informasi Tindakan Kriminal</div>
                        </div>
                    </div>
                </div>
            </div>

    <?php
    $array_kode_iso = array(
        array('iso'=>'ID-AC','name'=>'Aceh', 'code'=>11, 'data'=>$aceh),
        array('iso'=>'ID-SU','name'=>'Sumatera Utara', 'code'=>12, 'data'=>$sumut),
        array('iso'=>'ID-SB','name'=>'Sumatera Barat', 'code'=>13, 'data'=>$sumbar),
        array('iso'=>'ID-RI','name'=>'Riau', 'code'=>14, 'data'=>$riau),
        array('iso'=>'ID-JA','name'=>'Jambi', 'code'=>15, 'data'=>$jambi),
        array('iso'=>'ID-SL','name'=>'Sumatera Selatan', 'code'=>16, 'data'=>$sumsel),
        array('iso'=>'ID-BE','name'=>'Bengkulu', 'code'=>17, 'data'=>$bengkulu),
        array('iso'=>'ID-1024','name'=>'Lampung', 'code'=>18, 'data'=>$lampung),
        array('iso'=>'ID-BB','name'=>'Kepulauan Bangka Belitung', 'code'=>19, 'data'=>$babel),
        array('iso'=>'ID-KR','name'=>'Kepulauan Riau', 'code'=>21, 'data'=>$kepri),
        array('iso'=>'ID-JK','name'=>'Daerah Khusus Ibukota Jakarta', 'code'=>31, 'data'=>$jakarta),
        array('iso'=>'ID-JR','name'=>'Jawa Barat', 'code'=>32, 'data'=>$jabar),
        array('iso'=>'ID-JT','name'=>'Jawa Tengah', 'code'=>33, 'data'=>$jateng),
        array('iso'=>'ID-YO','name'=>'Daerah Istimewa Yogyakarta', 'code'=>34, 'data'=>$yogya),
        array('iso'=>'ID-JI','name'=>'Jawa Timur', 'code'=>35, 'data'=>$jatim),
        array('iso'=>'ID-BT','name'=>'Banten', 'code'=>36, 'data'=>$banten),
        array('iso'=>'ID-BA','name'=>'Bali', 'code'=>51, 'data'=>$bali),
        array('iso'=>'ID-NB','name'=>'Nusa Tenggara Barat', 'code'=>52, 'data'=>$ntb),
        array('iso'=>'ID-NT','name'=>'Nusa Tenggara Timur', 'code'=>53, 'data'=>$ntt),
        array('iso'=>'ID-KB','name'=>'Kalimantan Barat', 'code'=>61, 'data'=>$kalbar),
        array('iso'=>'ID-KT','name'=>'Kalimantan Tengah', 'code'=>62, 'data'=>$kalteng),
        array('iso'=>'ID-KS','name'=>'Kalimantan Selatan', 'code'=>63, 'data'=>$kalsel),
        array('iso'=>'ID-KI','name'=>'Kalimantan Timur', 'code'=>64, 'data'=>$kaltim),
        array('iso'=>'ID-KU','name'=>'Kalimantan Utara', 'code'=>65, 'data'=>$kalut),
        array('iso'=>'ID-SW','name'=>'Sulawesi Utara', 'code'=>71, 'data'=>$sulut),
        array('iso'=>'ID-ST','name'=>'Sulawesi Tengah', 'code'=>72, 'data'=>$sulteng),
        array('iso'=>'ID-SE','name'=>'Sulawesi Selatan', 'code'=>73, 'data'=>$sulsel),
        array('iso'=>'ID-SG','name'=>'Sulawesi Tenggara', 'code'=>74, 'data'=>$sultra),
        array('iso'=>'ID-GO','name'=>'Gorontalo', 'code'=>75, 'data'=>$gorontalo),
        array('iso'=>'ID-SR','name'=>'Sulawesi Barat', 'code'=>76, 'data'=>$sulbar),
        array('iso'=>'ID-MA','name'=>'Maluku', 'code'=>81, 'data'=>$maluku),
        array('iso'=>'ID-LA','name'=>'Maluku Utara', 'code'=>82, 'data'=>$malut),
        array('iso'=>'ID-IB','name'=>'Papua Barat', 'code'=>91, 'data'=>$pabar),
        array('iso'=>'ID-PA','name'=>'Papua', 'code'=>94, 'data'=>$papua)
    );

    $array_datas = array();
    foreach($array_kode_iso as $key=>$val){
        array_push($array_datas, array('hc-key'=>strtolower($val['iso']), 'name'=>$val['name'], 'value'=>$val['data']));
    }
    ?>
    <script type="text/javascript">
        $('.grafik').highcharts('Map', {
            credits: {
                enabled: false
            },
            title: {
                text: 'Tindakan Kriminal di Indonsia'
            },
            subtitle: {
                text: 'Berdasarkan data dari pantau kriminal'
            },
            mapNavigation: {
                enabled: true,
            },
            colorAxis: {
                minColor: '#bfedae',
                maxColor: '#4d8638'
            },
            series: [{
                data: <?php echo json_encode($array_datas); ?>,
                mapData: Highcharts.maps['countries/id/id-all'],
                joinBy: 'hc-key',
                name: 'Total Kriminalitas',
                animation: true,
                states: {
                    hover: {
                        color: '#f0ad4e'
                    }
                },
                dataLabels: {
                    enabled: false,
                    format: '{point.name}'
                }
            }]
        });
    </script>

    {{--<!-- Testimonials-section start -->--}}
    {{--<div class="row" style="background-color: white">--}}
    {{--<div class="col-md-12">--}}
        {{--<div class="pull-right" style="background-color: white; margin-left: 60%"> <small>Rendah</small>  <img style="width: 60%; " src="{{asset('images/bar.png')}}"/><small> Tinggi</small></div>--}}
        {{--<br>--}}
    {{--</div>--}}

    {{--</div>--}}


    <!-- service-section start -->
    <div class="bg-default space-medium" >
        <div class="container" >

            <div class="row" >
                @php $c= count($beritas)@endphp
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"  >

                        <div id="myCarousel" class="carousel slide col-lg-10 col-md-10 col-sm-10 col-xs-12" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators" >
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" style="border-radius: 20px;">
                                @if($c==0)
                                    <div class="item active">
                                        {{--                                    <img src="{{url('storage/'.$beritas->foto_berita)}}" class="img-responsive">--}}
                                        <img src="{{url('images/pk.png')}}" class="img-responsive">
                                        <label style="font-size: medium"> </label>
                                        <p style="background-color: white;"></p>
                                    </div>
                                    @else
                                <div class="item active">
{{--                                    <img src="{{url('storage/'.$beritas->foto_berita)}}" class="img-responsive">--}}
                                    <img src="{{url('storage/'.$beritas[$c-1]->foto_berita)}}" class="img-responsive">
                                    <label style="font-size: medium"> {!! $beritas[$c-1]->judul !!}</label>
                                    <p style="background-color: white;">{!! substr($beritas[$c-1]->narasi,0,180) !!}...</p>
                                </div>
                                @endif
                                @if($c>1)
                                    @php $i=0;@endphp
                                    @for($n=$c-2;$n>=0;$n--)
                                        @if($i<3)
                                            <div class="item" >
                                                <img src="{{url('storage/'.$beritas[$n]->foto_berita)}}" class="img-responsive">
                                                <label style="font-size: medium"> {!! $beritas[$n]->judul !!}</label>
                                                <p style="background-color: white;">{!! substr($beritas[$n]->narasi,0,180) !!}...</p>
                                            </div>
                                            @php $i++ @endphp
                                            @endif
                                    @endfor
                                    @endif

                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="border-radius: 20px;">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next" style="border-radius: 20px;">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
                        <br> <br> <br>
                        <h2>Mari Berantas Tindakan Kriminal !</h2>
                        <h3>#PantauKriminal</h3>
                        <p>Simak Berita Tindakan Kriminal di Pantau Kriminal</p>
                        <a href="{!! route('beritas.index') !!}" class="text-center btn btn-default">Lihat Semua . . .</a>
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
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-1">
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