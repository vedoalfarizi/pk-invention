@extends('app')
@section('content')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMgTgELYtNprJdgSrct8TXOoBePeBEwx4"></script>
    <section id="container" >

        <aside>
            <div id="sidebar"  class="nav-collapse ">

            </div>
        </aside>
        <section id="main-content">
            <section class="wrapper site-min-height">
                {!! Form::open(['url' => '/lapor/add', 'method' => 'post']) !!}
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-4">
                        <input hidden="yes" name="user_id">
                        <input hidden="yes" type="date" name="waktu_lapor" value="{{date('Y-m-d')}}" required="yes">
                        @php $perkaras = \App\Models\perkara::all(); @endphp
                        <select name="perkara_id" class="form-control">
                            <option value="{{$laporan->perkara_id}}">{{$laporan->perkaras->nama}}</option>
                            @foreach($perkaras as $perkara)
                                <option value="{{$perkara->id}}">{{$perkara->nama}}</option>
                                @endforeach
                        </select>
                        {!! Form::date('waktu_kejadian', $laporan->waktu_kejadian , ['class' => 'form-control', 'id' => 'myDate']) !!}
                        <input type="text" placeholder="Tempat Kejadian" class="form-control" name="tempat_kejadian" required="yes" value="{{$laporan->tempat_kejadian}}">
                        <input type="text" placeholder="Korban" class="form-control" name="korban" required="yes" value="{{$laporan->korban}}">
                        <input type="text" placeholder="Alamat korban" class="form-control" name="alamat_korban" value="{{$laporan->alamat_korban}}">
                        <input type="text" placeholder="Kerugian" class="form-control" name="kerugian" required="yes" value="{{$laporan->kerugian}}">
                        <input type="text" placeholder="Terlapor" class="form-control" name="pelapor" required="yes" value="{{$laporan->pelapor}}">
                        <input type="text" placeholder="Saksi" class="form-control" name="saksi" required="yes" value="{{$laporan->saksi}}">
                        <textarea rows="3" placeholder="uraian kejadian" class="form-control" name="uraian_kejadian" required="yes">{{$laporan->uraian_kejadian}}</textarea>
                    </div>
                    <div class="col-md-7">
                        <div class="col-md-12">
                            Lokasi kejadian :
                            <a class="btn btn-primary" role="button" data-toggle="collapse" onclick="aktifkanGeolocation()" title="Posisi sekarang"   ><i class="fa fa-map-marker" style="color:black;"></i></a>
                            <a class="btn btn-info" role="button" data-toggle="collapse" onclick="manualLocation()" title="Posisi manual"><i class="fa fa-location-arrow" style="color:white;"></i></a>
                            <input hidden="yes" type="text" id="lat" name="lat" required="yes">
                            <input hidden="yes" type="text" id="long" name="long" readonly style="background-color: lightblue;" required="yes">
                        </div>
                        <div class="col-md-12">
                            <div id="map" style="height:400px; padding-right: 50%"></div>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <center><input class="btn btn-primary" type="submit" onclick="check()"></center>
                        </div>
                        </div>

                    </div>
                {!! Form::close() !!}



                    <!--common script for all pages-->

                    <script type="text/javascript">
                        function check() {
                            $lat = document.getElementById('lat').value;
                            if($lat == 0){
                                alert('Isi Lokasi terlebih dahulu');
                            }

                        }

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

                                };console.log(pos.lat);
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
                            console.log(pos);
                            document.getElementById("lat").value = pos.lat;
                            document.getElementById("long").value = pos.lng;
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
            </section>
        </section>
    </section>


@endsection