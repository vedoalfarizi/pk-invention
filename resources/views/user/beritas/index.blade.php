@extends('app')

@section('content')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=de0yosu81oosgpzndnopzqfazp450uhcr1yn5n0uuykxd1mk"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMgTgELYtNprJdgSrct8TXOoBePeBEwx4"&language=id&region="ID"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
        // memanggil library Geocoder
        var geocoder = new google.maps.Geocoder();
        var map;
        // memanggil library Infowindow untuk memunculkan infowindow pada marker
        var infowindow = new google.maps.InfoWindow();
        var marker;

        // kita munculkan peta default


        // ambil value dari combobox



    </script>
    <div class="space-medium">
        <div class="container">
        <div class="row">
                <!-- service start -->
                @php $h=0; @endphp
                @forelse($beritas as $berita)
                    @php $h++; @endphp
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="tour-block" style="height: 650px">
                            <div class="tour-img">
                                <a href="{!! route('beritas.show' , [$berita->id]) !!}"><img src="{!! url('storage/'.$berita->foto_berita) !!}" alt="{!! $berita->judul !!}" style="height: 250px"></a>
                            </div>
                            <div class="tour-content">
                                <h3><a href="{!! route('beritas.show' , [$berita->id]) !!}" class="title">[{!! strtoupper($berita->laporans->perkaras->nama)!!}]<br>{!! $berita->judul !!}</a></h3>
                                <div class="tour-meta"> <span class="tour-meta-icon"><i class="fa fa-map-marker"></i></span><span id="lokasi-{{$h}}"></span> <span class="tour-meta-text"><br></span> <span class="tour-meta-icon"><i class="fa fa-calendar"></i></span><span class="tour-meta-text">{!! $berita->created_at->format('d M Y') !!}</span> </div>
                                <div class="tour-text mb40">
                                    <p>{!! substr($berita->narasi, 0, 50) !!} ...</p>
                                </div>
                                <script>
                                    a={{$berita->long}};
                                    b={{$berita->lat}};
                                    var latlng = new google.maps.LatLng(b, a);
                                    // cari lokasi dari latitude dan longitude
                                    geocoder.geocode({'location': latlng}, function(results, status) {
                                        if (status == google.maps.GeocoderStatus.OK) {
                                            // jika berhasil, map akan secara automatis berpindah ke koordinat tersebut
                                            if (results[1]) {
                                                simpan=results[1].formatted_address;
                                                $('#lokasi-'+{{$h}}).after(simpan);
                                            } else {
                                                window.alert('No results found');
                                            }
                                        } else {
                                            //window.alert('Geocoder failed due to: ' + status);
                                        }
                                    });
                                </script>

                                <div style="position:absolute; bottom: 50px;right: 50px;" class="tour-details-btn" > <span><a href="{!! route('beritas.show' , [$berita->id]) !!}" class="btn btn-primary" >Baca Selengkapnya</a></span> </div>

                            </div>
                        </div>
                    </div>
                    <!-- service close -->
                @empty
                    <h3>Belum ada informasi saat ini</h3>
                @endforelse
            </div>
            <ul class="pagination">
                {!! $beritas->links() !!}
            </ul>

    <!--common script for all pages-->



    <script type="text/javascript">
        window.onload=init;
        var infoDua = [];
        var markers = [];
        var markersDua = [];
        var markersDua1 = [];
        var circles=[];
        var rute = [];  //NAVIGASI
        var pos ='null';
        var infowindow;
        var centerBaru;
        var centerLokasi;
        var directionsDisplay;
        var marker_1 = []; //MARKER UNTUK POSISI SAAT INIvar marker_2 = []; //MARKER UNTUK POSISI SAAT INI
        var marker_2 = [];

        var cekRadiusStatus = "off";
        function init(){
            basemap();
        }

        function basemap() //google maps
        {

            map = new google.maps.Map(document.getElementById('map'),
                {
                    zoom: 13,
                    center: new google.maps.LatLng(-0.922376, 100.449646),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                });
        }

        function aktifkanGeolocation(){ //posisi saat ini

            navigator.geolocation.getCurrentPosition(function(position) {
                hapusMarkerInfowindow();
                hapusInfo();
                pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude

                };
                marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    animation: google.maps.Animation.DROP,
                });
                centerLokasi = new google.maps.LatLng(pos.lat, pos.lng);
                document.getElementById("lat").value = pos.lat;
                document.getElementById("long").value = pos.lng;
                markers.push(marker);
                infowindow = new google.maps.InfoWindow({
                    position: pos,
                    content: "<a style='color:black;'>Posisi anda sekarang</a> "
                });
                infowindow.open(map, marker);
                map.setCenter(pos);

                a=pos.lng;
                b=pos.lat;
                var latlng = new google.maps.LatLng(b, a);

                // cari lokasi dari latitude dan longitude
                geocoder.geocode({'location': latlng}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        // jika berhasil, map akan secara automatis berpindah ke koordinat tersebut
                        if (results[1]) {
                            simpan=results[1].formatted_address;
                            arrayAdd = simpan.split(",");

                            document.getElementById("provinsi").value = arrayAdd[arrayAdd.length-2];
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        //window.alert('Geocoder failed due to: ' + status);
                    }
                });
            });
        }

        function manualLocation(){ //posisi manual
            alert('Silahkan klik posisi manual pada peta');
            map.addListener('click', function(event) {
                addMarker(event.latLng);
            });
        }

        function addMarker(location){
            hapusposisi();
            marker = new google.maps.Marker({
                position : location,
                map: map,
                animation: google.maps.Animation.DROP,
            });
            pos = {
                lat: location.lat(), lng: location.lng()
            }
            centerLokasi = new google.maps.LatLng(pos.lat, pos.lng);
            markers.push(marker);
            infowindow = new google.maps.InfoWindow();
            infowindow.setContent('Posisi kejadian');
            infowindow.open(map, marker);
            usegeolocation=true;
            google.maps.event.clearListeners(map, 'click');

            document.getElementById("lat").value = pos.lat;
            document.getElementById("long").value = pos.lng;

            a=pos.lng;
            b=pos.lat;
            var latlng = new google.maps.LatLng(b, a);

            // cari lokasi dari latitude dan longitude
            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    // jika berhasil, map akan secara automatis berpindah ke koordinat tersebut
                    if (results[1]) {
                        simpan=results[1].formatted_address;
                        arrayAdd = simpan.split(",");

                        document.getElementById("provinsi").value = arrayAdd[arrayAdd.length-2];
                    } else {
                        window.alert('No results found');
                    }
                } else {
                    //window.alert('Geocoder failed due to: ' + status);
                }
            });

        }


        function hapus_kecuali_landmark(){
            hapusRadius();
            hapusMarkerTerdekat();
            hapusInfo();
            clearangkot();
            clearroute();
        }


        function reset(){
            $("#hasilcari1").hide();

            hapusInfo();
            clearroute2();
            clearroute();
            /* hapusMarkerTerdekat(); */
            $("#att2").hide();
        }

        function hapusMarkerTerdekat() {
            for (var i = 0; i < markersDua.length; i++) {
                markersDua[i].setMap(null);
            }
        }

        function hapusMarkerTerdekat1() {
            for (var i = 0; i < markersDua1.length; i++) {
                markersDua1[i].setMap(null);
            }
        }

        function hapusMarkerInfowindow(){
            setMapOnAll(null);
            hapusMarkerTerdekat();
            pos = 'null';
        }
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }
        function hapusInfo() {
            for (var i = 0; i < infoDua.length; i++) {
                infoDua[i].setMap(null);
            }
        }

        function hapusRadius(){
            for(var i=0;i<circles.length;i++)
            {
                circles[i].setMap(null);
            }
            circles=[];
            cekRadiusStatus = 'off';
        }


        function hapusposisi(){
            for (var i = 0; i < markers.length; i++){
                markers[i].setMap(null);
            }
            markers = [];
        }

        function clearroute(){
            for (i in rute){
                rute[i].setMap(null);
            }
            rute=[];
        }
    </script>
        </div>
    </div>

@endsection

