@include('adminlte-templates::common.errors')
<table class="table table-responsive" id="laporans-table">
    <thead>
        <tr>
            <th>Pelapor</th>
        <th>Waktu Lapor</th>
        <th>Perkara</th>
        <th>Waktu Kejadian</th>
        <th>Tempat Kejadian</th>
        <th>Status Laporan</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($laporans as $laporan)
        <tr>
            <td>{!! $laporan->users->name !!}</td>
            <td>{!! substr($laporan->created_at,0,10) !!}</td>
            <td>{!! $laporan->perkaras->nama !!}</td>
            <td>{!! substr($laporan->waktu_kejadian,0,10) !!}</td>
            <td>{!! $laporan->tempat_kejadian !!}</td>
            <td>

                @if( @$laporan->status_laporan==0)
                    <label class="label label-danger" style="color: white"> Belum Baca </label>
                @elseif(@$laporan->status_laporan==1)
                    <label class="label label-success" style="color: white"> Diterima </label>
                @elseif(@$laporan->status_laporan==2)
                    <label class="label label-default" style="color: white"> Ditolak </label>
                @elseif(@$laporan->status_laporan==3)
                    <label class="label label-primary" style="color: white"> Tindak lanjut </label>
               @endif
            </td>
            <td>
                <a class='btn btn-info btn-fill' data-toggle='modal' data-target='#lihat-{{$laporan->id}}'><i class="glyphicon glyphicon-eye-open"></i> Lihat </a>
            </td>
            <td>

                {!! Form::open(['route' => ['laporans.destroy', $laporan->id], 'method' => 'delete']) !!}
                {{--<div class='btn-group'>--}}
                    {{--<a href="{!! route('laporans.show', [$laporan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    {{--<a href="{!! route('laporans.edit', [$laporan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-fill', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {{--</div>--}}
                {!! Form::close() !!}

        {{--<------------------------ MODAL _ LAPORAN------------------->--}}
        <div class="modal fade" id="lihat-{{$laporan->id}}" data-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <div class="col-md-8">
                            <h2> Laporan - {{$laporan->id}}</h2>
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
                                        <td>: {!! $laporan->alamat_korban !!}</td>
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
                                        <td>: {!! $laporan->users->name !!}</td>
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
                                Uraian Kejadian : <br>
                                {{$laporan->uraian_kejadian}}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <center>
                            <div class="col-md-12">
                                <a class='btn btn-info btn-fill' data-toggle='modal' data-target='#diterima-{{$laporan->id}}'>Terima </a>
                                <a class='btn btn-danger btn-fill' data-toggle='modal' data-target='#ditolak-{{$laporan->id}}'>Tolak </a>
                            </div>
                            </center>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{--<------------------------ MODAL --------------------}}

                {{--<------------------------ MODAL _ DITERIMA------------------->--}}
                <div class="modal fade" id="diterima-{{$laporan->id}}" data-backdrop="false">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <div class="col-md-8">
                                    <h2> Laporan </h2>
                                </div>
                            </div>
                            <div class="modal-body">
                                {{--{{dd(date())}}--}}
                                {!! Form::model($laporan, ['route' => ['laporans.update', $laporan->id], 'method' => 'patch']) !!}
                                    <input name="user_id" value='{{$laporan->user_id}}' hidden="yes">
                                     <div class="form-group col-sm-12">

                                        <input name="no_surat" class="form-control col-md-6" type="text" placeholder="No surat"><br>
                                     </div>
                                    <div class="form-group col-sm-12">
                                        <input name="pasal" class="form-control col-md-6" placeholder="Pasal" required="yes"><br>
                                    </div>
                                    <input name="perkara_id" value="{{$laporan->perkara_id}}" hidden="yes"><br>
                                    <input name="tanggal_surat" value="{{date('Y-m-d H:i:s')}}" hidden="yes"><br><br>
                                    <button type="submit" value="1" name='status_laporan' class="btn btn-info btn-fill" >Terima</button>
                                {!! Form::close() !!}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<------------------------ MODAL --------------------}}

                {{--{--<------------------------ MODAL _ DITOLAK------------------->--}}
                <div class="modal fade" id="ditolak-{{$laporan->id}}" data-backdrop="false">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <div class="col-md-8">
                                    <h2> Laporan </h2>
                                </div>
                            </div>
                            <div class="modal-body">
                                {{--{{dd(date())}}--}}
                                {!! Form::model($laporan, ['route' => ['laporans.update', $laporan->id], 'method' => 'patch']) !!}
                                <input name="user_id" value='{{$laporan->user_id}}' hidden="yes">
                                <div class="form-group col-sm-12">
                                    Alasan :
                                    <textarea name="alasan" class="form-control col-md-6" placeholder="Alasan"></textarea><br>
                                </div>
                                <input name="perkara_id" value="{{$laporan->perkara_id}}" hidden="yes"><br><br><br>
                                <button type="submit" value="2" name='status_laporan' class="btn btn-danger btn-fill" >Tolak</button>
                                {!! Form::close() !!}
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