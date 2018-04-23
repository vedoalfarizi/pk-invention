@extends('app')
@section('content')
    <?php
    define('db_host','localhost');
    define('db_user','root');
    define('db_pass','');
    define('db_name','pk');
    $db = new mysqli(db_host,db_user,db_pass,db_name);
    if($db->connect_errno > 0){
        die('Unable to connect to database [' . $db->connect_error . ']');
    }
    ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE"></script>

    <section id="container" >

        <section id="main-content">
            <section class="wrapper site-min-height">
                <div class="row mt">
                    <div class="col-sm-8" id="hide2">
                        <section class="panel">
                            <header class="panel-heading"> <br/>
                                <label style="color: black">Cek Keamanan Lokasi</label>
                                <a class="btn btn-primary" role="button" data-toggle="collapse" onclick="aktifkanGeolocation()" title="Posisi Sekarang"   ><i class="fa fa-map-marker" style="color:black;"></i></a>
                                <a class="btn btn-info" role="button" data-toggle="collapse" onclick="manualLocation()" title="Atur Posisi Secara Manual"><i class="fa fa-location-arrow" style="color:white;"></i></a>
                                <a class="btn btn-warning" role="button" data-toggle="collapse" onclick="tampilsemua();resultt()" title="Tampilkan Semua Kriminalitas" aria-controls="terdekat"><i class="fa fa-map-pin" style="color:k;"></i></a>

                                <div class="well">
                                    <label><b>Radius&nbsp</b></label><label style="color:black" id="km"><b>0</b></label>&nbsp<label><b>m</b></label><br>
                                    <input  type="range" onclick="cek();aktifkanRadius();resultt()" id="inputradiusmes" name="inputradiusmes" data-highlight="true" min="1" max="50" value="1" >
                                </div>



                                </h3>
                            </header>
                            <div class="panel-body">
                                <div id="map" style="width:100%;height:400px;"></div>
                            </div>
                        </section>
                    </div>
                    <div class="col-sm-4" id="result">
                        <section class="panel">
                            <div class="panel-body">
                                <a class="btn btn-compose">Result</a>
                                <div class="box-body" style="max-height:400px;overflow:auto;">

                                    <div class="form-group" id="hasilcari1" style="display:none;">
                                        <table class="table table-bordered" id='hasilcari'>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>



                    <div class="col-sm-8" style="display:none;" id="infoo">
                        <section class="panel">
                            <div class="panel-body">
                                <a class="btn btn-compose">Information</a>
                                <div class="box-body" style="max-height:350px;overflow:auto;">

                                    <div class="form-group">
                                        <table class="table" id='info'>
                                            <tbody  style='vertical-align:top;'>
                                            </tbody>
                                        </table>

                                    </div>


                                </div>
                            </div>
                        </section>
                    </div>



                    <div class="col-sm-4" style="display:none;" id="resultaround">
                        <section class="panel">
                            <div class="panel-body">
                                <a class="btn btn-compose">Attraction Around</a>
                                <div class="box-body" style="max-height:400px;overflow:auto;">

                                    <div class="form-group" id="hasilcari2" style="display:none;">
                                        <table class="table table-bordered" id='hasilcariaround'>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>



                </div>

                <div class="row mt" style="display:none;" id="showlist">
                    <?php
                    //include 'connect.php';
                    //$sql = pg_query("SELECT * FROM worship_place");
                    ?>
                    <?php
                    $jml_kolom=3;
                    $cnt = 1;
//                    while($data =  pg_fetch_assoc($sql)){
//                    if ($cnt >= $jml_kolom)
//                    {
//                        echo "<div class='row mt mb'>";
//                    }

                    ?>
                    <div class="row-mt">
                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-6 desc">
                            <div class="project-wrapper">
                                <div class="project">
                                    <div class="photo-wrapper">
                                        <div class="photo">

                                        </div>
                                        <div class="overlay"></div>
                                       {{--nama dan alamat--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    if ($cnt >= $jml_kolom)
                    {

                        $cnt = 0;
                        echo "</div>";
                    }
//                    $cnt++;
//                    }
                    ?>


                </div>

            </section>

        </section>

    </section>

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
        var fotosrc = 'foto/';
        var directionsDisplay;
        var marker_1 = []; //MARKER UNTUK POSISI SAAT INIvar marker_2 = []; //MARKER UNTUK POSISI SAAT INI
        var marker_2 = [];
        //var server = "http://gisfaisal.in/tourism_bkt/t2-eng/";

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
                    zoom: 5,
                    center: new google.maps.LatLng(-0.456972, 118.433241),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                });
            var locations = [
            <?php

            $sql="select * from laporans";
            if(!$result = $db->query($sql)){
            die(' query error [' . $db->error . ']');
            }
            while($kriminal = $result->fetch_object()){
            echo "['".$kriminal->no_surat."', ".$kriminal->lat.", ".$kriminal->long.", ".$kriminal->id."],";
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
                    var ContenString='<a href="#'+locations[i][3]+'">No. Surat:'+locations[i][0]+'</a>"'
                    return function() {
                        infowindow.setContent(ContenString);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
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
                markers.push(marker);
                infowindow = new google.maps.InfoWindow({
                    position: pos,
                    content: "<a style='color:black;'>Anda berada disini</a> "
                });
                infowindow.open(map, marker);
                map.setCenter(pos);
            });
        }

        function manualLocation(){ //posisi manual
            hapusRadius();
            alert('Silahkan pilih lokasi pada peta');
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
            infowindow.setContent('Posisi manual');
            infowindow.open(map, marker);
            usegeolocation=true;
            google.maps.event.clearListeners(map, 'click');
            console.log(pos);

        }

        function aktifkanRadius(){ //fungsi radius mesjid
            if (pos == 'null'){
                alert ('Silahkan klik posisi sekarang atau atur posisi secara manual terlebih dahulu !');
            }
            else {
                hapusRadius();
                var inputradiusmes=document.getElementById("inputradiusmes").value;
                console.log(inputradiusmes);
                var circle = new google.maps.Circle({
                    center: pos,
                    radius: parseFloat(inputradiusmes*100),
                    map: map,
                    strokeColor: "blue",
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: "blue",
                    fillOpacity: 0.35
                });
                map.setZoom(14);
                map.setCenter(pos);
                circles.push(circle);
            }
            cekRadiusStatus = 'on';
            masjidradius();
        }

        function tampilsemua(){ //menampilkan semua masjid

            $.ajax({ url: server+'carimasjid.php', data: "", dataType: 'json', success: function (rows){
                cari_masjid(rows);
            }});
        }


        //memunculkan info ketika di klik marker
        function klikInfoWindow(id)
        {
            google.maps.event.addListener(marker, "click", function(){
                detailmes_infow(id);

            });

        }

        function klikInfoWindow_ow(id)
        {
            google.maps.event.addListener(marker, "click", function(){
                detailow_infow(id);

            });

        }

        function klikInfoWindow_industri(id)
        {
            google.maps.event.addListener(marker, "click", function(){
                detailindustri_infow(id);

            });

        }

        function klikInfoWindow_oleh(id)
        {
            google.maps.event.addListener(marker, "click", function(){
                detailoleh_infow(id);

            });

        }


        function klikInfoWindow_res(id)
        {
            google.maps.event.addListener(marker, "click", function(){
                detailres_infow(id);

            });

        }



        function detailmes_infow(id){  //menampilkan informasi dari marker yang di klik

            $('#info').empty();
            hapusInfo();
            clearroute2();
            clearroute();
            clearangkot();
            $.ajax({
                url: server+'detailmasjid1.php?cari='+id, data: "", dataType: 'json', success: function(rows)
                {
                    console.log("hiaiii");
                    console.log(id);
                    for (var i in rows)
                    {

                        console.log('dd');
                        var row = rows[i];
                        var id = row.id;
                        var nama = row.name_mesjid;
                        var alamat=row.address;
                        var image = row.image;
                        var latitude  = row.latitude;
                        var longitude = row.longitude ;
                        centerBaru = new google.maps.LatLng(row.latitude, row.longitude);
                        marker = new google.maps.Marker
                        ({
                            position: centerBaru,
                            icon:'assets/ico/marker_masjid.png',
                            map: map,
                            animation: google.maps.Animation.DROP,
                        });
                        console.log(latitude);
                        console.log(longitude);
                        markersDua.push(marker);
                        map.setCenter(centerBaru);
                        map.setZoom(18);
                        infowindow = new google.maps.InfoWindow({
                            position: centerBaru,
                            content: "<span style=color:black><center><b>Information</b><br><img src='"+fotosrc+image+"' alt='image in infowindow' width='150'></center><br><i class='fa fa-home'></i> "+nama+"<br><i class='fa fa-map-marker'></i> "+alamat+"<br><a role='button' title='tracking' class='btn btn-default fa fa-car' value='Route' onclick='callRoute(centerLokasi, centerBaru);rutetampil();resetangkot();'></a>&nbsp<a role='button' title='gallery' class='btn btn-default fa fa-picture-o' value='Gallery' onclick='galeri(\""+id+"\")'></a></span>",
                            pixelOffset: new google.maps.Size(0, -33)
                        });
                        infoDua.push(infowindow);
                        hapusInfo();
                        infowindow.open(map);

                    }


                }
            });
        }


        var rad_lat=0;
        var rad_lng=0;
        function tampil_sekitar(latitude,longitude,nama){

            rad_lat = latitude;
            rad_lng = longitude;
            console.log(rad_lat);
            console.log(rad_lng);
            document.getElementById("inputradius1").style.display = "inline";

            // POSISI MARKER
            centerBaru = new google.maps.LatLng(latitude, longitude);
            var marker = new google.maps.Marker({map: map, position: centerBaru,
                icon:'assets/ico/marker_masjid.png',
                animation: google.maps.Animation.DROP,
                clickable: true});
        }



        function aktifkanRadiusSekitar(){
            hapusRadius();
            hapusMarkerTerdekat();
            var pos = new google.maps.LatLng(rad_lat, rad_lng);
            map.setCenter(pos);
            map.setZoom(16);
            console.log(pos);
            console.log(rad_lat);
            console.log(rad_lng);
            var inputradius1=document.getElementById('inputradius1').value;
            var a=document.getElementById('check_h').value;
            console.log(inputradius1);
            var rad = parseFloat(inputradius1*100);
            var circle = new google.maps.Circle({
                center: pos,
                radius: rad,
                map: map,
                strokeColor: "blue",
                strokeOpacity: 0.5,
                strokeWeight: 1,
                fillColor: "blue",
                fillOpacity: 0.35
            });
            circles.push(circle);
            console.log("aada");

            if (document.getElementById('check_t').checked) {
                owsekitar(rad_lat,rad_lng,rad);
            }

            if (document.getElementById('check_h').checked) {
                hotelsekitar(rad_lat,rad_lng,rad);
            }

            if (document.getElementById('check_i').checked) {
                industrisekitar(rad_lat,rad_lng,rad);
            }

            if (document.getElementById('check_oo').checked) {
                oleholehsekitar(rad_lat,rad_lng,rad);
            }

            if (document.getElementById('check_k').checked) {
                kulinersekitar(rad_lat,rad_lng,rad);
            }
            if (document.getElementById('check_r').checked) {
                restaurantsekitar(rad_lat,rad_lng,rad);
            }



        }



        function cek()
        {
            document.getElementById('km').innerHTML=document.getElementById('inputradiusmes').value*100
        }

        function cek1()
        {
            document.getElementById('km1').innerHTML=document.getElementById('inputradius1').value*100
        }

        function reset_rute () { //RESET KLIK RUTE
            tujuan=0;
            awal=0;
            hapus_kecuali_landmark();
            basemap();
            $('#hasilcari').empty();
            $('#hasilcari').append("<thead><th>Angkot Code</th><th>Route</th><th>Gallery</th></thead>");

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


        function info1(){
            $("#infoo").show();
            $("#att2").hide();
            $("#radiuss").hide()
            $("#infoo1").hide();;

            $("#infoev").hide();
        }

        function infoev(){
            $("#infoo").hide();
            $("#att2").hide();
            $("#infoev").show();
            $("#radiuss").hide()
            $("#infoo1").hide();


        }

        function info12(){
            $("#infoo1").show();
            $("#radiuss").hide();
            $("#infoo").hide();
            $("#att2").hide();
            $("#infoev").hide();
        }


        function resultt(){
            $("#result").show();
            $("#resultaround").hide();
            $("#eventt").hide();
            $("#infoo").hide();
            $("#att1").hide();
            $("#hide2").show();
            $("#showlist").hide();
            $("#radiuss").hide();
            $("#infoo1").hide();
            $("#att2").hide();
            $("#infoev").hide();
        }

        function resultt1(){
            $("#result").show();
            $("#resultaround").show();
            $("#eventt").hide();
            $("#infoo").hide();
            $("#att1").hide();
            $("#hide2").show();
            $("#showlist").hide();
            $("#radiuss").hide();
            $("#infoo1").hide();
            $("#att2").hide();
            $("#infoev").hide();
        }

        function list(){
            $("#result").hide();
            $("#eventt").hide();
            $("#infoo").hide();
            $("#att1").hide();
            $("#hide2").hide();
            $("#showlist").show();
            $("#radiuss").hide();
            $("#infoo1").hide();
            $("#att2").hide();
            $("#infoev").hide();
        }



        function cekRadius(){
            rad = inputradiusmes.value*100;
            console.log(rad);
        }

        function cekRadius1(){
            rad = inputradius1.value*100;
            console.log(rad);
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