@include('adminlte-templates::common.errors')
<table class="table table-responsive" id="laporans-table">
    <thead>
        <tr>
            <th>Pelapor</th>
        <th>Waktu Lapor</th>
        <th>Perkara</th>
        {{--<th>Waktu Kejadian</th>--}}
        {{--<th>Tempat Kejadian</t>h--}}
        {{--<th>Status Laporan</th>--}}
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>

    @foreach($laporans_terima as $laporan)

        <tr>
            <td>{!! $laporan->users->name !!}</td>
            <td>{!! substr($laporan->created_at,0,10) !!}</td>
            <td>{!! $laporan->perkaras->nama !!}</td>
            <td>
                <a class='btn btn-info btn-fill' data-toggle='modal' data-target='#lihat-{{$laporan->id}}'><i class="glyphicon glyphicon-eye-open"></i> Lihat </a>
            </td>
            <td>
        {{--<------------------------ MODAL _ LAPORAN------------------->--}}
        <div class="modal fade" id="lihat-{{$laporan->id}}" data-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <div class="col-md-8">
                            <h2> Laporan - {{$laporan->id}}</h2>
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
                        <a type="button" class="btn btn-warning btn-fill" data-toggle='modal' data-target='#tindak'><i class="glyphicon glyphicon-arrow-right"></i> Tindak Lanjut</a>
                        <a type="button" class="btn btn-primary btn-fill" target="_blank" href="{{url('/pelaporans/cetak/'.$laporan->id)}}"><i class="glyphicon glyphicon-print"></i> Cetak</a>
                        <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{--<------------------------ MODAL --------------------}}


                {{--<------------------------ MODAL _ ADD------------------->--}}
                <div class="modal fade" id="tindak" data-backdrop="false" index="+1">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <div class="col-md-8">
                                    Tambah Perkembangan Laporan
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                {!! Form::open(['route' => 'perkembanganLaps.store', 'enctype' => 'multipart/form-data' ]) !!}
                                {!! Form::hidden('laporan_id', $laporan->id,['class' => 'form-control']) !!}
                                {{--                {!! Form::hidden('laporan_id', 0 ,['class' => 'form-control']) !!}--}}
                                <!-- Keterangan -->
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('keterangan', 'Keterangan :') !!}
                                        {!! Form::textarea('keterangan', null,['class' => 'form-control', 'required' => 'yes']) !!}
                                    </div>

                                    <!-- Keterangan -->
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('file', 'Dokumen Pendukung :') !!}
                                        {!! Form::file('file', null, ['class' => 'form-control']) !!}
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
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
<ul class="pagination pagination-sm inline pull-right">
    {!! $laporans_terima->links() !!}
</ul>