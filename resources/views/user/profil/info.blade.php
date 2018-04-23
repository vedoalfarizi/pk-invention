<div class="row">
    {{--<a href="{!! url('/lapor') !!}" title="Lapor" class="btn btn-warning pull-right"><font color="white">Tambah Peinfo</font></a>--}}

    @include('adminlte-templates::common.errors')

    @foreach($infos as $info)
    <div class="col-lg-12 col-md-4 col-sm-3 col-xs-3">
        <div class="service-block">
            <div class="service-content">
                <div class="row">
                    <div class="col-md-12">
                        <h1><a href="#" class="title">{{$info->judul}}</a></h1>
                    </div>
                    <div class="col-lg-12">
                        <p>{{substr($info->narasi,0,200)}} ...</p>
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

    {{--<table class="table table-responsive" id="infos-table">--}}
        {{--<thead>--}}
        {{--<tr>--}}
            {{--<th>Judul</th>--}}
            {{--<th>Perkara</th>--}}
            {{--<th>narasi</th>--}}
            {{--<th>Tempat Kejadian</th>--}}
            {{--<th>Status info</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@foreach($infos as $info)--}}
            {{--<tr>--}}
                {{--<td>{!! substr($info->created_at,0,10) !!}</td>--}}
                {{--<td>{!! $info->perkaras->nama !!}</td>--}}
                {{--<td>{!! substr($info->waktu_kejadian,0,10) !!}</td>--}}
                {{--<td>{!! $info->tempat_kejadian !!}</td>--}}
                {{--<td>--}}

                    {{--@if( @$info->status_info==0)--}}
                        {{--<label class="label label-danger" style="color: white"> Belum Baca </label>--}}
                    {{--@elseif(@$info->status_info==1)--}}
                        {{--<label class="label label-success" style="color: white"> Diterima </label>--}}
                    {{--@elseif(@$info->status_info==2)--}}
                        {{--<label class="label label-default" style="color: white"> Ditolak </label>--}}
                    {{--@elseif(@$info->status_info==3)--}}
                        {{--<label class="label label-primary" style="color: white"> Tindak lanjut </label>--}}
                    {{--@endif--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--<a class='btn btn-info btn-fill' data-toggle='modal' data-target='#lihat-{{$info->id}}'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--@if($info->status_info == null)--}}
                        {{--<a class='btn btn-primary btn-fill' href="{{url('/info/edit/'.$info->id)}}"><i class="glyphicon glyphicon-edit"></i></a>--}}
                    {{--@else--}}
                        {{--<a class='btn btn-primary btn-fill' disabled="yes" ><i class="glyphicon glyphicon-edit"></i></a>--}}
                    {{--@endif--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--{!! Form::open(['route' => ['infos.destroy', $info->id], 'method' => 'delete']) !!}--}}
                    {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-fill', 'onclick' => "return confirm('Are you sure?')", 'style' => 'margin-top : -4px']) !!}--}}
                    {{--{!! Form::close() !!}--}}

                    {{--<------------------------ MODAL _ info------------------->--}}
                    {{--<div class="modal fade"  id="lihat-{{$info->id}}" data-backdrop="false">--}}
                        {{--<div class="modal-dialog">--}}
                            {{--<div class="modal-content">--}}

                                {{--<div class="modal-header">--}}
                                    {{--<div class="col-md-8">--}}
                                        {{--<h2> info - {{$info->id}}</h2>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="modal-body">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-7">--}}
                                            {{--//info--}}
                                            {{--<table class="table table-responsive">--}}
                                                {{--<h4>HAL LAPOR</h4>--}}
                                                {{--<tr>--}}
                                                    {{--<td>waktu</td>--}}
                                                    {{--<td>: {!! $info->waktu_kejadian !!}</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Perkara </td>--}}
                                                    {{--<td>: {!! $info->perkaras->nama!!}</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Tempat Kejadian </td>--}}
                                                    {{--<td>: {!! $info->tempat_kejadian !!}</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Korban </td>--}}
                                                    {{--<td>: {!! $info->korban !!}</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Alamat Korban</td>--}}
                                                    {{--<td>: {!! $info->alamat_korban !!}</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Kerugian </td>--}}
                                                    {{--<td>: {!! $info->kerugian !!}</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Terlapor </td>--}}
                                                    {{--<td>: {!! $info->pelapor !!}</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Saksi </td>--}}
                                                    {{--<td>: {!! $info->saksi !!}</td>--}}
                                                {{--</tr>--}}
                                            {{--</table>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-5">--}}
                                            {{--<table class="table table-responsive">--}}
                                                {{--<h4>DATA PELAPOR</h4>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Nama</td>--}}
                                                    {{--<td>: {!! $info->profiles->username !!}</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Tempat Lahir </td>--}}
                                                    {{--<td>: {!! $info->profiles->tempat_lahir !!}</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Tanggal Lahir </td>--}}
                                                    {{--<td>: {!! substr($info->profiles->tanggal_lahir,0,10)!!}</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Jenis Kelamin </td>--}}
                                                    {{--<td>: @if($info->profiles->jekel==1)--}}
                                                            {{--Laki - Laki--}}
                                                        {{--@else Perempuan--}}
                                                        {{--@endif</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Pekerjaan </td>--}}
                                                    {{--<td>: {!! $info->profiles->pekerjaan !!}</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>Alamat </td>--}}
                                                    {{--<td>: {!! $info->profiles->alamat!!}</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<td>No HP </td>--}}
                                                    {{--<td>: {!! $info->profiles->no_hp!!}</td>--}}
                                                {{--</tr>--}}
                                            {{--</table>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-12" style="background-color: #e6e5e5">--}}
                                            {{--Uraian Kejadian : <br>--}}
                                            {{--{{$info->uraian_kejadian}}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<br>--}}



                                {{--</div>--}}
                                {{--<div class="modal-footer">--}}
                                    {{--@if($info->status_info == 1)--}}
                                        {{--<a type="button" class="btn btn-primary btn-fill" target="_blank" href="{{url('/peinfos/cetak/'.$info->id)}}"><i class="glyphicon glyphicon-print"></i> Cetak Surat</a>--}}
                                    {{--@endif--}}
                                    {{--<button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Close</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<------------------------ MODAL --------------------}}


                {{--</td>--}}
            {{--</tr>--}}

        {{--@endforeach--}}

        {{--</tbody>--}}
    {{--</table>--}}
</div>