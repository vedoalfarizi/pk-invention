@extends('app')

@section('content')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMgTgELYtNprJdgSrct8TXOoBePeBEwx4"></script>
    <div class="space-medium">

        <div class="container">
            <div class="row pull-left" >
                <div class="tour-details-btn"> <span><a href="{!! action('profilUserController@index') !!}" class="btn btn-primary">kembali</a></span> </div>
               <br><br>
            </div>

                        <div class="row">

                            <!-- post-one-start -->
                            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="post-block">
                                    <div class="post-img"><img src="{!! url('storage/'.$info->file_foto) !!}" alt="Foto Info dan Tips" class="img-responsive"></div>
                                    <div class="post-sticky"> <i class="fa fa-map-marker">{!! $info->lat !!}|{!! $info->long !!} </i> </div>
                                    <div class="post-content">

                                        <div class="meta"> <span class="meta-date">Dibagikan pada {!! $info->created_at->format('d M Y') !!} </span> <span class="meta-author">Perkara - <a href="#">{!! $info->perkara->nama!!}</a></span> </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <p class="blockquote">{!! $info->judul !!} <br>
                                    </p>

                                <p>{!! $info->narasi !!}</p>


                                <div class="tour-details-btn"> <span><a  data-toggle="modal" data-target="#edit-{{$info->id}}" class="btn btn-primary">Ubah</a></span> </div>
                            {!! Form::open(['route' => ['infos.destroy', $info->id], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            {!! Form::close() !!}
                                <!--comments start-->
                                <div class="comment-area">
                                    <div class="row">
                                        <div class=" col-lg-12 col-md-12">
                                            <div class="comment-title">
                                                @php
                                                    $comments = \App\Models\komentarInfo::where('info_id', '=', $info->id)->orderBy('created_at', 'desc')->get();
                                                    $jumlahComment = \App\Models\komentarInfo::where('info_id', '=', $info->id)->count();
                                                @endphp
                                                <h2>({!! $jumlahComment !!}) Comments</h2>
                                                <ul class="comment-list">
                                                    @foreach($comments as $comment)
                                                        <li>
                                                            <div class="comment-info">
                                                                <h4 class="user-title">{!! $comment->user->name !!}</h4>
                                                                <div class="meta">
                                                                    <div class="comment-meta-date">{!! $comment->created_at->format('d M, Y') !!}</div>
                                                                </div>
                                                                <div class="comment-content">
                                                                    <p>{!! $comment->komentar !!}</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </div>
                            </div>
            <div class="row pull-left" >
                <div class="tour-details-btn"> <span><a href="{!! action('profilUserController@index') !!}" class="btn btn-primary">kembali</a></span> </div>

                <br><br>

            </div>
                        </div>

                    </div>



    {!! Form::model($info, ['route' => ['infos.update', $info->id], 'method' => 'patch', 'id' => 'form', 'files' => true]) !!}
    @if(Auth::check())
        {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
        {!! Form::hidden('status_verifikasi', 0, ['class' => 'form-control']) !!}
    @endif

    <!-- Modal -->
    <div class="modal fade " tabindex="-1" role="dialog" id="edit-{{$info->id}}">
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
                                {!! Form::text('judul', $info->judul, ['class' => 'form-control', 'placeholder' => 'Judul Info & Tips']) !!}
                            </div>

                            <div class="form-group col-md-12">
                                <label>Perkara</label>
                                @php
                                    $perkaras = \App\Models\perkara::get()->pluck('nama', 'id');
                                @endphp
                                {!! Form::select('perkara_id', $perkaras, $info->perkara->nama, ['class' => 'form-control', 'placeholder' => 'Jenis Perkara']) !!}
                            </div>
                            @if($info->file_foto!=NULL)
                                <div class="form-group col-md-12">
                                <img src="{!! url('storage/'.$info->file_foto) !!}" alt="Foto Info dan Tips" class="img-responsive">
                                </div>
                            @endif

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
                            {!! Form::textarea('narasi', $info->narasi, ['class' => 'form-control', 'placeholder' => 'Ceritakan kronologi kejadian, bagikan juga tips untuk mencegah kejadian terulang']) !!}
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  class="btn btn-success" id="ajaxSubmit">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}


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
@endsection

