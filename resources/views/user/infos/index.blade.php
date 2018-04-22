@extends('app')

@section('content')
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 pull-left">
                    {!! Form::open(['route' => 'infos.filter']) !!}

                        {!! Form::selectYear('year', 2017, date(now()), null, ['class' => 'form-control']) !!}
                        {!! Form::submit('Filter', ['class' => 'btn btn-default btn-xs mb30']) !!}

                    {!! Form::close() !!}
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <a href="#" class="btn btn-default btn-xs mb30 pull-right">Berbagi Informasi</a>
                </div>
            </div>
            <div class="row">
                <!-- service start -->
                @forelse($infos as $info)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="tour-block">
                        <div class="tour-img">
                            <a href="{!! route('infos.show' , [$info->id]) !!}"><img src="{!! url('storage/'.$info->file_foto) !!}" alt="{!! $info->judul !!}"></a>
                        </div>
                        <div class="tour-content">
                            <h2><a href="{!! route('infos.show' , [$info->id]) !!}" class="title">[{!! strtoupper($info->perkara->nama)!!}]<br>{!! $info->judul !!}</a></h2>
                            <div class="tour-meta"> <span class="tour-meta-icon"><i class="fa fa-map-marker"></i></span><span class="tour-meta-text">{!! $info->lat !!}|{!! $info->long !!}</span> <span class="tour-meta-text">|</span> <span class="tour-meta-icon"><i class="fa fa-calendar"></i></span><span class="tour-meta-text">{!! $info->created_at->format('d M Y') !!}</span> </div>
                            <div class="tour-text mb40">
                                <p>{!! substr($info->narasi, 0, 100) !!} ...</p>
                            </div>
                            <div class="tour-details">
                                <div class="tour-details-text">
                                    <span class="tour-meta-icon"><i class="fa fa-comment"></i>10</span>
                                    <span class="tour-meta-icon"><i class="fa fa-thumbs-up"></i>11</span>
                                    <span class="tour-meta-icon"><i class="fa fa-thumbs-down"></i>12</span>
                                    @if($info->status_verifikasi == 1)
                                        <span class="tour-meta-icon"><i class="fa fa-check-circle">Verified</i></span>
                                    @endif
                                </div>
                                <div class="tour-details-btn"> <span><a href="{!! route('infos.show' , [$info->id]) !!}" class="btn btn-primary">Baca Selengkapnya</a></span> </div>
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
@endsection

