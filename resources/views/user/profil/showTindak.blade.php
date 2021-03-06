@extends('app')

@section('content')

    <div class="space-medium">

        <div class="container">

        <div class="row">
            <div class="col-md-6">
                <h3>Laporan ID  {{$laporan->id}}</h3>
                <h4>Nomor : {{$laporan->no_surat}}</h4>
            </div>
            <div class="col-md-6">
                <a class="btn btn-primary pull-right" style="margin-right: 20px;margin-bottom: 5px" data-toggle='modal' data-target='#add'>Add New</a>
                <a class="btn btn-primary pull-right" style="margin-right: 20px;margin-bottom: 5px" data-toggle='modal' data-target='#detail'>Detail Laporan</a>
            </div>

            <hr width="100%">
        </div>
        @include('flash::message')
        <table class="table table-responsive" id="laporans-table">

            <thead>
            <tr>
                <th>Keterangan Perkembangan</th>
                <th>File Pendukung</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @php $perkem = \App\Models\perkembanganLap::where('laporan_id',$laporan->id)->get();@endphp
            @foreach($perkem as $p)
                <tr>
                    <td>{!! substr($p->keterangan,0,100)!!}...</td>
                    <td>@if($p->file==NULL)
                            <label class="label label-default">Tidak ada File</label>
                            @else
                            <a class="btn btn-info btn-xs" target="_blank" href="{{url('/pelaporans/dokumen/'.$p->id)}}">lihat Dokumen</a>
                    </td>
                    @endif
                    <td>

                        <div class='btn-group'>
                            <a data-toggle='modal' data-target='#lihat-{{$p->id}}' class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-eye-open"></i>Lihat </a>
                            {{--<a data-toggle='modal' data-target='#edit-{{$p->id}}' class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-edit"></i> Ubah </a>--}}
                             </div>

                        {{--<------------------------ MODAL _ LIHAT------------------->--}}
                        <div class="modal fade" id="lihat-{{$p->id}}" data-backdrop="false">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <div class="col-md-8">
                                           Perkembangan Laporan
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{$p->keterangan}}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--<------------------------ MODAL --------------------}}


                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>



        {{--<------------------------ MODAL _ LAPORAN------------------->--}}
        <div class="modal fade" id="detail" data-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <div class="col-md-8">
                            <h2> Laporan - {{$laporan->laporan_id}}</h2>
                            <p> Nomor Surat - {{$laporan->no_surat}}</p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-7">
                                {{--//Laporan--}}
                                <table class="table table-responsive">
                                    <h4>HAL LAPOR</h4>
                                    <tr>
                                        <td>waktu</td>
                                        <td>: {!! $laporan->waktu_kejadian !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Perkara </td>
                                        <td>: {!! $laporan->perkaras->nama!!}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Kejadian </td>
                                        <td>: {!! $laporan->tempat_kejadian !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Korban </td>
                                        <td>: {!! $laporan->korban !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Korban</td>
                                        <td>: {!!$laporan->alamat_korban !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Kerugian </td>
                                        <td>: {!! $laporan->kerugian !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Terlapor </td>
                                        <td>: {!! $laporan->pelapor !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Saksi </td>
                                        <td>: {!! $laporan->saksi !!}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-5">
                                <table class="table table-responsive">
                                    <h4>DATA PELAPOR</h4>
                                    <tr>
                                        <td>Nama</td>
                                        <td>: {!! $laporan->username !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir </td>
                                        <td>: {!! $laporan->profiles->tempat_lahir !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir </td>
                                        <td>: {!! substr($laporan->profiles->tanggal_lahir,0,10)!!}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin </td>
                                        <td>: @if($laporan->profiles->jekel==1)
                                                Laki - Laki
                                            @else Perempuan
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <td>Pekerjaan </td>
                                        <td>: {!! $laporan->profiles->pekerjaan !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat </td>
                                        <td>: {!! $laporan->profiles->alamat!!}</td>
                                    </tr>
                                    <tr>
                                        <td>No HP </td>
                                        <td>: {!! $laporan->profiles->no_hp!!}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12" style="background-color: #e6e5e5">
                                <strong> Uraian Kejadian :</strong>
                                <br>  <br>
                                {{$laporan->uraian_kejadian}}
                                <br><br>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Pasal : <label style="font-size: medium"> {{$laporan->pasal}}</label></strong>
                            </div>
                        </div>
                        <br>

                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-primary btn-fill" target="_blank" href="{{url('/pelaporans/cetak/'.$laporan->id)}}"><i class="glyphicon glyphicon-print"></i> Cetak</a>
                        <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{--<------------------------ MODAL --------------------}}
            <div class="row pull-left" >
                <div class="tour-details-btn"> <span><a href="{!! action('profilUserController@index') !!}" class="btn btn-primary">kembali</a></span> </div>
                <br><br>
            </div>
        </div>

    </div>

    @endsection