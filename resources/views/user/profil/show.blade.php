@extends('app')

@section('content')

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




@endsection

