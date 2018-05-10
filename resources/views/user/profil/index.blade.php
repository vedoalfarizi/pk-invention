@extends('app')

@section('content')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMgTgELYtNprJdgSrct8TXOoBePeBEwx4"></script>
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
            @if(isset($mesage))
                @if($mesage=='berhasil')
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sukses!</strong> {{$isi_mesage}}
                </div>
                @elseif($mesage=='gagal')
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Gagal!</strong>
                </div>
                @endif
            @endif

            <div class="row">

                <div class="col-lg-3">
                    <h3>Selamat Datang, <small>{{auth::user()->name}}</small></h3>
                    <p>{{auth::user()->email}}</p>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a data-toggle="tab" href="#Beranda">Beranda</a></li>
                        <li><a data-toggle="tab" href="#laporan">Laporan</a></li>
                        <li><a data-toggle="tab" href="#tindak">Tindak Lanjut</a></li>
                        <li><a data-toggle="tab" href="#profil">Profil</a></li>
                    </ul>
                </div>
                <div class="col-lg-9">

                     <div class="tab-content">
                         @php $profil = \App\Models\profile::where('user_id',auth::user()->id)->first();@endphp
                            <div id="Beranda" class="tab-pane fade in active">
                                @if($profil!= null)
                                @include('user.profil.info')
                                    @else
                                    <div class="form-group col-sm-12">
                                        <h4 class="text-danger">Silahkan Lengkapi Profil Anda</h4>
                                    </div>
                                    @endif
                            </div>
                            <div id="laporan" class="tab-pane fade">
                                @if($profil!= null)
                                @include('user.profil.laporan')
                                @else
                                    <div class="form-group col-sm-12">
                                        <h4 class="text-danger">Silahkan Lengkapi Profil Anda</h4>
                                    </div>
                                    @endif
                            </div>
                             <div id="tindak" class="tab-pane fade">
                             @if($profil!= null)
                                 @include('user.profil.tindak')
                             @else
                                 <div class="form-group col-sm-12">
                                     <h4 class="text-danger">Silahkan Lengkapi Profil Anda</h4>
                                 </div>
                             @endif
                         </div>
                            <div id="profil" class="tab-pane fade">

                                @include('user.profil.profil')

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <!--common script for all pages-->

    <script type="text/javascript">
        $(function() {
            //    fancybox
            jQuery(".fancybox").fancybox();
        });

    </script>
    <script type="text/javascript">
        $('#inputradius').slider({
            formatter: function(value) {
                return value+' km';
            }
        });
        $('[data-toggle="tooltip"]').tooltip();
    </script>
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
            tempatibadah();
            kecamatanTampil();
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
@endsection

