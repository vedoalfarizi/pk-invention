@extends('app')

@section('content')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMgTgELYtNprJdgSrct8TXOoBePeBEwx4"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
        // memanggil library Geocoder
        var geocoder = new google.maps.Geocoder();
        var map;
        // memanggil library beritaswindow untuk memunculkan beritaswindow pada marker
        var beritaswindow = new google.maps.beritasWindow();
        var marker;
    </script>

    <div class="space-medium">
        <div class="container">
            <div class="row">
                <!-- post-one-start -->
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="post-block">
                        <div class="post-img"><img src="{!! url('storage/'.$beritas->foto_berita) !!}" alt="Foto beritas dan Tips" class="img-responsive"></div>
                    <!--<div class="post-sticky"> <i class="fa fa-map-marker">{!! $beritas->lat !!}|{!! $beritas->long !!} </i> </div>-->

                    </div>
                </div>

                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
{{--                    <h1 class="post-title">{!! $beritas->laporans->perkara->nama !!}</h1>--}}
                    <p class="blockquote">{!! $beritas->judul !!}
                    {{--<div class="meta"> <span class="meta-date">Dibagikan pada {!! $beritas->created_at->format('d M Y') !!} </span> <span class="meta-author">oleh <a href="#">{!! $beritas->user->name !!}</a>--}}
                        <div1 id="lokasi"></div1>
                    </div>
                <br>
                    <p class="text-justify">{!! $beritas->narasi !!}</p>
                <p>
                        <div class="g-plus" data-action="share" data-href="{!! url()->current() !!}"></div>
                        <a target="_blank" href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><br>
                        <div class="fb-share-button" data-href="{!! url()->current() !!}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fpilihkamar.com%2Fpk&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Bagikan</a></div>
                </p>


                    <script>
                        a={!! $beritas->long !!};
                        b={!! $beritas->lat !!};
                        var latlng = new google.maps.LatLng(b, a);
                        // cari lokasi dari latitude dan longitude
                        geocoder.geocode({'location': latlng}, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                // jika berhasil, map akan secara automatis berpindah ke koordinat tersebut
                                if (results[1]) {
                                    simpan=results[1].formatted_address;
                                    $('#lokasi').before('<br/>'+simpan);
                                } else {
                                    window.alert('No results found');
                                }
                            } else {
                                //window.alert('Geocoder failed due to: ' + status);
                            }
                        });
                    </script>

            </div>
            <a href="{!! route('beritas.index') !!}" class="text-center btn btn-default">Lihat Berita Lainnya</a>
        </div>
    </div>

@endsection

