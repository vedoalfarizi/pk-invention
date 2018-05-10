<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=de0yosu81oosgpzndnopzqfazp450uhcr1yn5n0uuykxd1mk"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<div class="row">
    {{--<a href="{!! url('/lapor') !!}" title="Lapor" class="btn btn-warning pull-right"><font color="white">Tambah Peinfo</font></a>--}}

    @include('adminlte-templates::common.errors')
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-right">
        @if(Auth::check())
            <button type="button" class="btn btn-default btn-xs mb30 pull-right" data-toggle="modal" data-target="#myModal" id="open">Berbagi Informasi</button>
        @else
            <a type="button" class="btn btn-default btn-xs mb30 pull-right" href="{!! url('/login') !!}">Berbagi Informasi</a>
        @endif
    </div>

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
                                    {!! Form::hidden('lng', null, ['class' => 'form-control', 'id' => 'long']) !!}

                                        <div class="alert alert-warning alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                           Jangan lupa set lokasi Anda!
                                        </div>
                                        <div class="form-group col-md-12">
                                            {!! Form::hidden('provinsi', null, ['class' => 'form-control', 'placeholder' => 'provinsi', 'id' => 'provinsi', 'readonly']) !!}
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


    @foreach($infos as $info)
    <div class="col-lg-12 col-md-4 col-sm-3 col-xs-12">
        <div class="service-block">
            <div class="service-content">
                <div class="row">
                    <div class="col-md-12">
                        <h1><a href="#" class="title">{!! $info->judul !!}</a></h1>
                    </div>
                    <div class="col-lg-12">
                        <p>{!! substr($info->narasi,0,200) !!} ...</p>
                    </div>

                </div>
                <div class="tour-details">
                    @php $komentars = \App\Models\komentarInfo::where('info_id',$info->id)->get();
                     $like = \App\Models\feedbackInfo::where('info_id',$info->id)->where('status_feed',1)->get();
                     $dislike =\App\Models\feedbackInfo::where('info_id',$info->id)->where('status_feed',2)->get();@endphp
                    <div class="tour-details-text">
                        <span class="tour-meta-icon"><i class="fa fa-comment"></i>{{count($komentars)}}</span>
                   <span class="tour-meta-icon"><i class="fa fa-thumbs-up"></i>{{count($like)}}</span>
                        <span class="tour-meta-icon"><i class="fa fa-thumbs-down"></i>{{count($dislike)}}</span>
                        @if($info->status_verifikasi == 1)
                            <span class="tour-meta-icon"><i class="fa fa-check-circle">Verified</i></span>
                        @endif
                    </div>
                    <div class="tour-details-btn"> <span><a href="{!! url('/info/'.$info->id) !!}" class="btn btn-primary">Baca Selengkapnya</a></span> </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <ul class="pagination pagination-sm inline pull-right">
        {!! $infos->links() !!}
    </ul>


