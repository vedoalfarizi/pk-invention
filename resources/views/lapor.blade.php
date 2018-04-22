@extends('app')
@section('content')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMgTgELYtNprJdgSrct8TXOoBePeBEwx4"></script>
    <section id="container" >

        <aside>
            <div id="sidebar"  class="nav-collapse ">


                </ul>
            </div>
        </aside>
        <section id="main-content">
            <section class="wrapper site-min-height">
                <div class="row mt">
                    <div style="float: left; padding-left: 2%">
                        <br/>
                        <input type="text" placeholder="Perkara/jenis tindak kriminal" style="width:200%;"> <br/><br/>
                        <input type="text" placeholder="Korban" style="width:200%;"> <br/><br/>
                        <input type="text" placeholder="Alamat korban" style="width:200%;"> <br/><br/>
                        <input type="text" placeholder="Kerugian" style="width:200%;"> <br/><br/>
                        <input type="text" placeholder="Terlapor" style="width:200%;"> <br/><br/>
                        <input type="text" placeholder="Alamat terlapor" style="width:200%;"> <br/><br/>
                        <input type="text" placeholder="Saksi" style="width:200%;"> <br/><br/>
                        <textarea rows="5" placeholder="uraian kejadian" style="width: 200%"></textarea>
                    </div>

                            <div style="float: right">
                                <br/>
                                Lokasi kejadian :
                                <a class="btn btn-primary" role="button" data-toggle="collapse" onclick="aktifkanGeolocation()" title="Posisi sekarang"   ><i class="fa fa-map-marker" style="color:black;"></i></a>
                                <a class="btn btn-info" role="button" data-toggle="collapse" onclick="manualLocation()" title="Posisi manual"><i class="fa fa-location-arrow" style="color:white;"></i></a>
                                <input type="text" id="lat" readonly style="background-color: lightblue;">
                                <input type="text" id="long" readonly style="background-color: lightblue;">
                            </div>
                    <br/><br/><br/><br/>
                                <div id="map" style="width:60%;height:400px; float: right; padding-right: 50%"></div>
                </div>
                <br/>

                <center><button class="btn btn-primary"">Kirim Laporan</button></center>



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
                    </body>
                    </html>
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
                </div>
@endsection