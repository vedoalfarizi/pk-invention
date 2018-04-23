@extends('app')

@section('content')
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <!-- post-one-start -->
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="post-block">
                        <div class="post-img"><img src="{!! url('storage/'.$info->file_foto) !!}" alt="Foto Info dan Tips" class="img-responsive"></div>
                        <div class="post-sticky"> <i class="fa fa-map-marker">{!! $info->lat !!}|{!! $info->long !!} </i> </div>
                        <div class="post-content">
                            <div>
                                <h1 class="post-title">{!! $info->perkara->nama !!}</h1>
                            </div>
                            <div class="meta"> <span class="meta-date">Dibagikan pada {!! $info->created_at->format('d M Y') !!} </span> <span class="meta-author">by <a href="#">{!! $info->user->name !!}</a></span> </div>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p class="blockquote">{!! $info->judul !!}</p>
                    <p>{!! $info->narasi !!}</p>

                    @php
                        $relatedPosts = \App\Models\info::where('perkara_id', '=', $info->perkara_id)
                                        ->orderBy('created_at', 'desc')->limit(3)->get();
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

