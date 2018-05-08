@extends('layouts.app')
@section('content')
    <script src="{!! asset('code/highcharts.js') !!}"></script>
    <script src="{!! asset('code/modules/exporting.js') !!}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <?php
    define('db_host','localhost');
    define('db_user','root');
    define('db_pass','');
    define('db_name','pk');
    $db = new mysqli(db_host,db_user,db_pass,db_name);
    if($db->connect_errno > 0){
        die('Unable to connect to database [' . $db->connect_error . ']');
    }

    $sql="select * from laporans";
    if(!$result = $db->query($sql)){
        die(' query error [' . $db->error . ']');
    }

    ?>
    <script type="text/javascript">
        // memanggil library Geocoder
        var geocoder = new google.maps.Geocoder();
        var map;
        // memanggil library Infowindow untuk memunculkan infowindow pada marker
        var infowindow = new google.maps.InfoWindow();
        var marker;


        function codeLatLng() {
        }

        google.maps.event.addDomListener(window, 'load', initialize);
        var simpan;
        var n=0;
    </script>
    {{--<script>codeLatLng()</script>--}}
    <?php
    $n=0;
    while($kriminal = $result->fetch_object()){
        $lokasi=$kriminal->lat.",".$kriminal->long;
        echo "
        <script>
            // ambil value dari combobox
            var input = '".$lokasi."';
            var latlngStr = input.split(',', 2);
            var latlng = new google.maps.LatLng(latlngStr[0], latlngStr[1]);
            // cari lokasi dari latitude dan longitude
            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    // jika berhasil, map akan secara automatis berpindah ke koordinat tersebut
                    if (results[1]) {
                        simpan = results[1].formatted_address;

                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });

        </script>



        ";
    }
//    $('#lokasi').after(simpan+'<br/>');
    ?>

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

    <div id="lokasi"></div>
    <div class="container">
        <div class="row">
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



            <script type="text/javascript">

                Highcharts.chart('container', {
                    chart: {
                        type: 'bar'
                    },
                    title: {
                        text: 'Peringkat Kejadian Kriminal'
                    },
                    subtitle: {
                        text: 'per provinsi di Indonesia'
                    },
                    xAxis: {
                        categories: [
                            'Nanggroe Aceh Darussalam',
                            'Sumatera Utara',
                            'Riau',
                            'Kep. Riau',
                            'Sumatera Barat',
                            'Bengkulu',
                            'Jambi',
                            'Bangka Belitung',
                            'Sumatera Selatan',
                            'Lampung',
                            'Banten',
                            'Jakarta',
                            'Jawa Barat',
                            'Jawa Tengah',
                            'D.I. Yogyakarta',
                            'Jawa Timur',
                            'Kalimantan Barat',
                            'Kalimantan Utara',
                            'Kalimantan Timur',
                            'Kalimantan Tengah',
                            'Kalimantan Selatan',
                            'Sulawesi Barat',
                            'Sulawesi Utara',
                            'Sulawesi Timur',
                            'Sulawesi Selatan',
                            'Sulawesi Tengah',
                            'Gorontalo',
                            'Bali',
                            'Nusa Tenggara Barat',
                            'Nusa Tenggara Timur',
                            'Maluku',
                            'Maluku Utara',
                            'Papua Barat',
                            'Papua'
                        ],
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Jumlah kriminalitas per provinsi'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y} </b>tindak kejahatan</td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.1,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name: 'Total kriminalitas',
                        data: [
                            {!! $aceh  !!},
                            {!! $sumut !!},
                            {!! $riau !!},
                            {!! $kepri !!},
                            {!! $sumbar !!},
                            {!! $bengkulu !!},
                            {!! $jambi  !!},
                            {!! $babel !!},
                            {!! $sumsel !!},
                            {!! $lampung !!},
                            {!! $banten !!},
                            {!! $jakarta !!},
                            {!! $jabar  !!},
                            {!! $jateng !!},
                            {!! $yogya !!},
                            {!! $jatim !!},
                            {!! $kalbar !!},
                            {!! $kalut !!},
                            {!! $kaltim  !!},
                            {!! $kalteng !!},
                            {!! $kalsel !!},
                            {!! $sulbar !!},
                            {!! $sulut !!},
                            {!! $sulteng !!},
                            {!! $sultra !!},
                            {!! $gorontalo !!},
                            {!! $bali !!},
                            {!! $ntb !!},
                            {!! $ntt  !!},
                            {!! $maluku !!},
                            {!! $malut !!},
                            {!! $pabar !!},
                            {!! $papua !!}
                                ]

                    }]
                });
            </script>
            <center>
                <br/>
                <h2>Peta Persebaran Tindak Kejahatan Kriminal</h2>

                <div id="map" style="width:100%;height:400px"></div>
            </center>
        </div>




    </div>



    </section>

    </section>

    </body>
    </html>

    <script type="text/javascript">

        (function() {
            window.onload = function() {
                var map;
                //Parameter Google maps
                var options = {
                    zoom: 5, //level zoom
                    //posisi tengah peta
                    center: new google.maps.LatLng(-0.456972, 118.433241),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                // Buat peta di
                var map = new google.maps.Map(document.getElementById('map'), options);
                // Tambahkan Marker
                var locations = [
                  <?php

                    $sql="select * from infos";
                    if(!$result = $db->query($sql)){
                        die(' query error [' . $db->error . ']');
                    }
                    while($kriminal = $result->fetch_object()){
                        echo "['".$kriminal->judul."', ".$kriminal->lat.", ".$kriminal->long.", ".$kriminal->id."],";
                    }
                    ?>

                ];
                var infowindow = new google.maps.InfoWindow();

                var marker, i;
                /* kode untuk menampilkan banyak marker */
                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                        icon: 'marker.png',
                        animation: google.maps.Animation.BOUNCE
                    });
                    /* menambahkan event clik untuk menampikan
                      infowindows dengan isi sesuai denga
                      marker yang di klik */

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        var ContenString='<a href="../infos/'+locations[i][3]+'" target="_blank">'+locations[i][0]+'</a>"'
                        return function() {
                            infowindow.setContent(ContenString);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }


            };
        })();

    </script>
    </div>
@endsection

