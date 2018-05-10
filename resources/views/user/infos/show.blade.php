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
    </script>

    <div class="space-medium">
        <div class="container">
            <div class="row">
                <!-- post-one-start -->
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="post-block">
                        <div class="post-img"><img src="{!! url('storage/'.$info->file_foto) !!}" alt="Foto Info dan Tips" class="img-responsive"></div>
                    <!--<div class="post-sticky"> <i class="fa fa-map-marker">{!! $info->lat !!}|{!! $info->lng !!} </i> </div>-->
                        <div class="post-content">

                        </div>
                    </div>
                </div>

                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="post-title">{!! $info->perkara->nama !!}</h1>
                    <p class="blockquote">{!! $info->judul !!}
                    <div class="meta"> <span class="meta-date">Dibagikan pada {!! $info->created_at->format('d M Y') !!} </span> <span class="meta-author">oleh <a href="#">{!! $info->user->name !!}</a>
                        <div1 id="lokasi"></div1>
                    </span>
                    </div>
                    </p>
                    <p class="text-justify">{!! $info->narasi !!}</p>
                    <p>
                        <div class="g-plus" data-action="share" data-href="{!! url()->current() !!}"></div>
                        <a target="_blank" href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><br>
                        <div class="fb-share-button" data-href="{!! url()->current() !!}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fpilihkamar.com%2Fpk&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Bagikan</a></div>
                    </p>



                    <script>
                        a={!! $info->lng !!};
                        b={!! $info->lat !!};
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

                    @php
                        $relatedPosts = \App\Models\info::where('perkara_id', '=', $info->perkara_id)->where('id', '!=', $info->id)
                                        ->inRandomOrder()->limit(3)->get();
                    @endphp
                    <div class="related-block">
                        <div class="row">
                            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h2>Related Post</h2>
                                <div class="row">
                                    @foreach($relatedPosts as $relatedPost)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="related-post">
                                                <div class="related-img">
                                                    <a href="{!! route('infos.show' , [$relatedPost->id]) !!}" class="imghover"><img src="{!! url('storage/'.$relatedPost->file_foto) !!}" alt="Foto" class="img-responsive"></a>
                                                </div>
                                                <div class="related-post-content">
                                                    <h2><a href="#" class="title">{!! $relatedPost->judul !!}</a></h2>
                                                    <span class="meta-categories">{!! $relatedPost->perkara->nama !!}</span></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--comments start-->
                    <div class="comment-area">
                        <div class="row">
                            <div class=" col-lg-12 col-md-12">
                                <div class="comment-title">
                                    @php
                                        $comments = \App\Models\komentarInfo::where('info_id', '=', $info->id)->orderBy('created_at', 'desc')->get();
                                        $jumlahKomentar = \App\Models\komentarInfo::where('info_id', '=', $info->id)->count();
                                        $jumlahLike = \App\Models\feedbackInfo::where('info_id', $info->id)
                                                ->where('status_feed', 1)->count();
                                        $jumlahDislike = \App\Models\feedbackInfo::where('info_id', $info->id)
                                                ->where('status_feed', 0)->count();

                                        if(Auth::check()){
                                            $feedback = \App\Models\feedbackInfo::where('info_id', $info->id)->where('user_id', Auth::user()->id)->first();
                                        }

                                    @endphp

                                    @if(Auth::check())
                                        @if($feedback === NULL)
                                            {!! Form::open(['route' => 'feedbackInfos.store']) !!}

                                            {!! Form::hidden('info_id', $info->id, ['class' => 'form-control']) !!}
                                            {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}

                                            <span class="tour-meta-icon"><i class="fa fa-comment fa-2x"></i>{!! $jumlahKomentar !!}</span>
                                            <span class="tour-meta-icon"><button style="border:none; background-color: transparent;" type="submit" name="status_feed" value="1"><i class="fa fa-thumbs-up fa-2x"></i></button>{!! $jumlahLike !!}</span>
                                            <span class="tour-meta-icon"><button style="border: none; background-color: transparent;" type="submit" name="status_feed" value="0"><i class="fa fa-thumbs-down fa-2x"></i></button>{!! $jumlahDislike !!}</span>

                                            {!! Form::close() !!}
                                        @elseif($feedback->status_feed == 1)

                                            {!! Form::model($feedback, ['route' => ['feedbackInfos.update', $feedback->id], 'method' => 'patch']) !!}

                                            {!! Form::hidden('info_id', $info->id, ['class' => 'form-control']) !!}
                                            {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}

                                            <span class="tour-meta-icon"><i class="fa fa-comment fa-2x"></i>{!! $jumlahKomentar !!}</span>
                                            <span class="tour-meta-icon-act"><button style="border: none; background-color: transparent;" type="submit" name="status_feed" value="2"><i class="fa fa-thumbs-up fa-2x"></i></button>{!! $jumlahLike !!}</span>
                                            <span class="tour-meta-icon"><button style="border: none; background-color: transparent;" type="submit" name="status_feed" value="0"><i class="fa fa-thumbs-down fa-2x"></i></button>{!! $jumlahDislike !!}</span>

                                            {!! Form::close() !!}
                                        @elseif($feedback->status_feed == 0)

                                            {!! Form::model($feedback, ['route' => ['feedbackInfos.update', $feedback->id], 'method' => 'patch']) !!}

                                            {!! Form::hidden('info_id', $info->id, ['class' => 'form-control']) !!}
                                            {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}

                                            <span class="tour-meta-icon"><i class="fa fa-comment fa-2x"></i>{!! $jumlahKomentar !!}</span>
                                            <span class="tour-meta-icon"><button style="border:none; background-color: transparent;" type="submit" name="status_feed" value="1"><i class="fa fa-thumbs-up fa-2x"></i></button>{!! $jumlahLike !!}</span>
                                            <span class="tour-meta-icon-act"><button style="border: none; background-color: transparent;" type="submit" name="status_feed" value="2"><i class="fa fa-thumbs-down fa-2x"></i></button>{!! $jumlahDislike !!}</span>

                                            {!! Form::close() !!}
                                        @elseif($feedback->status_feed == 2)

                                            {!! Form::model($feedback, ['route' => ['feedbackInfos.update', $feedback->id], 'method' => 'patch']) !!}

                                            {!! Form::hidden('info_id', $info->id, ['class' => 'form-control']) !!}
                                            {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}

                                            <span class="tour-meta-icon"><i class="fa fa-comment fa-2x"></i>{!! $jumlahKomentar !!}</span>
                                            <span class="tour-meta-icon"><button style="border:none; background-color: transparent;" type="submit" name="status_feed" value="1"><i class="fa fa-thumbs-up fa-2x"></i></button>{!! $jumlahLike !!}</span>
                                            <span class="tour-meta-icon"><button style="border: none; background-color: transparent;" type="submit" name="status_feed" value="0"><i class="fa fa-thumbs-down fa-2x"></i></button>{!! $jumlahDislike !!}</span>

                                            {!! Form::close() !!}
                                        @endif
                                    @endif
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

                    @if(Auth::check())
                        @if($info->user_id != Auth::user()->id)
                            <div class="leave-comments">
                                <h2 class="comment-title">Leave A Reply</h2>
                                {!! Form::open(['route' => 'komentarInfos.store']) !!}
                                {!! Form::hidden('info_id', $info->id, ['class' => 'form-control']) !!}
                                {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            {!! Form::label('komentar', 'Komentar:') !!}
                                            {!! Form::textarea('komentar', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                        <div class="form-group">

                                            {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-sm']) !!}

                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        @endif
                    @else
                        <div class="leave-comments">
                            <h2 class="comment-title">Leave A Reply</h2>
                            {!! Form::open(['route' => 'komentarInfos.store']) !!}
                            {!! Form::hidden('info_id', $info->id, ['class' => 'form-control']) !!}

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label('komentar', 'Komentar:') !!}
                                        {!! Form::textarea('komentar', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <a href="{!! url('/login') !!}" class="btn btn-primary btn-sm">Submit</a>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

