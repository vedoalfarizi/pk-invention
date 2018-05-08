@extends('app')

@section('content')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=de0yosu81oosgpzndnopzqfazp450uhcr1yn5n0uuykxd1mk"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @if(Auth::check())
                        <button type="button" class="btn btn-default btn-xs mb30 pull-right" data-toggle="modal" data-target="#myModal" id="open">Berbagi Informasi</button>
                    @else
                        <a type="button" class="btn btn-default btn-xs mb30 pull-right" href="{!! url('/login') !!}">Berbagi Informasi</a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 pull-left">
                    {!! Form::open(['route' => 'infos.filter']) !!}

                    {!! Form::selectYear('year', 2017, date(now()), null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 pull-left">
                    {!! Form::submit('Filter', ['class' => 'btn btn-default btn-xs mb30']) !!}
                </div>

                {!! Form::close() !!}
            </div>

            <div class="row">
            {!! Form::open(['route' => 'infos.store', 'id' => 'form', 'files' => true]) !!}
            @if(Auth::check())
                {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
                {!! Form::hidden('status_verifikasi', 0, ['class' => 'form-control']) !!}
            @endif

            <!-- Modal -->
                <div class="modal fade " tabindex="-1" role="dialog" id="myModal">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="alert alert-danger" style="display:none"></div>
                            <div class="modal-header">

                                <h5 class="modal-title">Berbagi Informasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="row"><br></div>
                                        <div class="form-group col-md-12">
                                            <label>Judul</label>
                                            {!! Form::text('judul', null, ['class' => 'form-control', 'placeholder' => 'Judul Info & Tips']) !!}
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Perkara</label>
                                            @php
                                                $perkaras = \App\Models\perkara::get()->pluck('nama', 'id');
                                            @endphp
                                            {!! Form::select('perkara_id', $perkaras, null, ['class' => 'form-control', 'placeholder' => 'Jenis Perkara']) !!}
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Provinsi</label>
                                            {!! Form::text('provinsi', null, ['class' => 'form-control', 'placeholder' => 'provinsi', 'id' => 'provinsi', 'readonly']) !!}
                                        </div>

                                        <div class="form-group col-md-12">
                                            {!! Form::file('file_foto', null, ['class' => 'form-control']) !!}
                                        </div>


                                    </div>
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-12">
                                                Lokasi kejadian :
                                                <a class="btn btn-primary" role="button" data-toggle="collapse" onclick="aktifkanGeolocation()" title="Posisi sekarang"   ><i class="fa fa-map-marker" style="color:black;"></i></a>
                                                <a class="btn btn-info" role="button" data-toggle="collapse" onclick="manualLocation()" title="Posisi manual"><i class="fa fa-location-arrow" style="color:white;"></i></a>
                                                {!! Form::hidden('lat', null, ['class' => 'form-control', 'id' => 'lat']) !!}
                                                {!! Form::hidden('long', null, ['class' => 'form-control', 'id' => 'long']) !!}
                                                <div class="alert alert-warning alert-dismissible">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    Jangan lupa set lokasi Anda!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="map" style="height:300px; padding-right: 10%" class="col-md-12"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="padding: 5%">
                                        {!! Form::textarea('narasi', null, ['class' => 'form-control', 'placeholder' => 'Ceritakan kronologi kejadian, bagikan juga tips untuk mencegah kejadian terulang']) !!}
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button  class="btn btn-success" id="ajaxSubmit">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="row">
                <!-- service start -->
                @php $h=0; @endphp
                @forelse($infos as $info)
                    @php $h++; @endphp
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="tour-block" style="height: 650px">
                            <div class="tour-img">
                                <a href="{!! route('infos.show' , [$info->id]) !!}"><img src="{!! url('storage/'.$info->file_foto) !!}" alt="{!! $info->judul !!}" style="height: 250px"></a>
                            </div>
                            <div class="tour-content">
                                <h3><a href="{!! route('infos.show' , [$info->id]) !!}" class="title">[{!! strtoupper($info->perkara->nama)!!}]<br>{!! $info->judul !!}</a></h3>
                                <div class="tour-meta"> <span class="tour-meta-icon"><i class="fa fa-map-marker"></i></span><span id="lokasi-{{$h}}"></span> <span class="tour-meta-text"><br></span> <span class="tour-meta-icon"><i class="fa fa-calendar"></i></span><span class="tour-meta-text">{!! $info->created_at->format('d M Y') !!}</span> </div>
                                <div class="tour-text mb40">
                                    <p>{!! substr($info->narasi, 0, 50) !!} ...</p>
                                </div>
                                <script>
                                    a={{$info->long}};
                                    b={{$info->lat}};
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
                                @php
                                    $jumlahKomentar = \App\Models\komentarInfo::where('info_id', $info->id)->count();
                                    $jumlahLike = \App\Models\feedbackInfo::where('info_id', $info->id)
                                                    ->where('status_feed', 1)->count();
                                    $jumlahDislike = \App\Models\feedbackInfo::where('info_id', $info->id)
                                                    ->where('status_feed', 0)->count();

                                @endphp

                                <div>
                                    <div class="tour-details-text" style="position:absolute; bottom: 50px;">
                                        <hr width="300px" style="border-color: yellow">
                                        <br>
                                        <span class="tour-meta-icon"><i class="fa fa-comment"></i>{!! $jumlahKomentar !!}</span>
                                        <span class="tour-meta-icon"><i class="fa fa-thumbs-up"></i>{!! $jumlahLike !!}</span>
                                        <span class="tour-meta-icon"><i class="fa fa-thumbs-down"></i>{!! $jumlahDislike !!}</span>
                                        @if($info->status_verifikasi == 1)
                                            <span class="tour-meta-icon"><i class="fa fa-check-circle">Verified</i></span>
                                        @endif
                                    </div>
                                    <div style="position:absolute; bottom: 50px;right: 50px;" class="tour-details-btn" > <span><a href="{!! route('infos.show' , [$info->id]) !!}" class="btn btn-primary" >Baca Selengkapnya</a></span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- service close -->
                @empty
                    <h3>Belum ada informasi saat ini</h3>
                @endforelse
            </div>
            <ul class="pagination">
                {!! $infos->links() !!}
            </ul>
        </div>
    </div>

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

@endsection

