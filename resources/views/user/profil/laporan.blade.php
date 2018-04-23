<div class="row">
    <a href="{!! url('/lapor') !!}" title="Lapor" class="btn btn-warning pull-right"><font color="white">Tambah Pelaporan</font></a>

    @include('adminlte-templates::common.errors')
    <table class="table table-responsive" id="laporans-table">
        <thead>
        <tr>
            <th>Waktu Lapor</th>
            <th>Perkara</th>
            <th>Waktu Kejadian</th>
            <th>Tempat Kejadian</th>
            <th>Status Laporan</th>
            <th>Lihat</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
{{--        {{dd(count($laporans))}}--}}

        @foreach($laporans as $laporan)
            <tr>
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
                    <a class='btn btn-info btn-fill' data-toggle='modal' data-target='#lihat-{{$laporan->id}}'><i class="glyphicon glyphicon-eye-open"></i></a>
                </td>
                <td>
                    @if($laporan->status_laporan == null)
                        <a class='btn btn-primary btn-fill' href="{{url('/laporan/edit/'.$laporan->id)}}"><i class="glyphicon glyphicon-edit"></i></a>
                    @else
                        <a class='btn btn-primary btn-fill' disabled="yes" ><i class="glyphicon glyphicon-edit"></i></a>
                     @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['laporans.destroy', $laporan->id], 'method' => 'delete']) !!}
                     {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-fill', 'onclick' => "return confirm('Are you sure?')", 'style' => 'margin-top : -4px']) !!}
                    {!! Form::close() !!}

                    {{--<------------------------ MODAL _ LAPORAN------------------->--}}
                    <div class="modal fade"  id="lihat-{{$laporan->id}}" data-backdrop="false">
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
                                                    <td>: {!! $laporan->profiles->username !!}</td>
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



                                </div>
                                <div class="modal-footer">
                                    @if($laporan->status_laporan == 1)
                                        <a type="button" class="btn btn-primary btn-fill" target="_blank" href="{{url('/pelaporans/cetak/'.$laporan->id)}}"><i class="glyphicon glyphicon-print"></i> Cetak Surat</a>
                                    @endif
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
</div>