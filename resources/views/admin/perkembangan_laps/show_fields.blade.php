<div class="row">
    <div class="col-md-6">
        <h3>Laporan ID  {{$perkembanganLap->laporan_id}}</h3>
        <h4>Nomor : {{$perkembanganLap->laporans->no_surat}}</h4>
    </div>
    <div class="col-md-6">
        <a class="btn btn-primary pull-right" style="margin-right: 20px;margin-bottom: 5px" data-toggle='modal' data-target='#add'>Add New</a>
        <a class="btn btn-primary pull-right" style="margin-right: 20px;margin-bottom: 5px" data-toggle='modal' data-target='#detail'>Detail Laporan</a>
    </div>

    <hr width="100%">
</div>
@include('flash::message')
<table class="table table-responsive" id="perkembanganLaps-table">

    <thead>
    <tr>
        <th>Keterangan Perkembangan</th>
        <th>File Pendukung</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @php $perkem = \App\Models\perkembanganLap::where('laporan_id',$perkembanganLap->laporan_id)->get();@endphp
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
                {!! Form::open(['route' => ['perkembanganLaps.destroy', $p->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a data-toggle='modal' data-target='#lihat-{{$p->id}}' class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-eye-open"></i>Lihat </a>
                    <a data-toggle='modal' data-target='#edit-{{$p->id}}' class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-edit"></i> Ubah </a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
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

                {{--<------------------------ MODAL _ EDIT------------------->--}}
                <div class="modal fade" id="edit-{{$p->id}}" data-backdrop="false">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <div class="col-md-8">
                                    Perkembangan Laporan
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    {!! Form::model($perkembanganLap, ['route' => ['perkembanganLaps.update', $perkembanganLap->id], 'method' => 'patch', 'enctype' => 'multipart/form-data' ]) !!}

                                    {!! Form::hidden('laporan_id', $perkembanganLap->laporan_id,['class' => 'form-control']) !!}
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

{{--<------------------------ MODAL _ ADD------------------->--}}
<div class="modal fade" id="add" data-backdrop="false">
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
                {!! Form::hidden('laporan_id', $perkembanganLap->laporan_id,['class' => 'form-control']) !!}
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

{{--<------------------------ MODAL _ LAPORAN------------------->--}}
<div class="modal fade" id="detail" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <div class="col-md-8">
                    <h2> Laporan - {{$perkembanganLap->laporan_id}}</h2>
                    <p> Nomor Surat - {{$perkembanganLap->laporans->no_surat}}</p>
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
                                <td>: {!! $perkembanganLap->laporans->waktu_kejadian !!}</td>
                            </tr>
                            <tr>
                                <td>Perkara </td>
                                <td>: {!! $perkembanganLap->laporans->perkaras->nama!!}</td>
                            </tr>
                            <tr>
                                <td>Tempat Kejadian </td>
                                <td>: {!! $perkembanganLap->laporans->tempat_kejadian !!}</td>
                            </tr>
                            <tr>
                                <td>Korban </td>
                                <td>: {!! $perkembanganLap->laporans->korban !!}</td>
                            </tr>
                            <tr>
                                <td>Alamat Korban</td>
                                <td>: {!!$perkembanganLap->laporans->alamat_korban !!}</td>
                            </tr>
                            <tr>
                                <td>Kerugian </td>
                                <td>: {!! $perkembanganLap->laporans->kerugian !!}</td>
                            </tr>
                            <tr>
                                <td>Terlapor </td>
                                <td>: {!! $perkembanganLap->laporans->pelapor !!}</td>
                            </tr>
                            <tr>
                                <td>Saksi </td>
                                <td>: {!! $perkembanganLap->laporans->saksi !!}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-5">
                        <table class="table table-responsive">
                            <h4>DATA PELAPOR</h4>
                            <tr>
                                <td>Nama</td>
                                <td>: {!! $perkembanganLap->laporans->users->name !!}</td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir </td>
                                <td>: {!! $perkembanganLap->laporans->profiles->tempat_lahir !!}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir </td>
                                <td>: {!! substr($perkembanganLap->laporans->profiles->tanggal_lahir,0,10)!!}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin </td>
                                <td>: @if($perkembanganLap->laporans->profiles->jekel==1)
                                        Laki - Laki
                                    @else Perempuan
                                    @endif</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan </td>
                                <td>: {!! $perkembanganLap->laporans->profiles->pekerjaan !!}</td>
                            </tr>
                            <tr>
                                <td>Alamat </td>
                                <td>: {!! $perkembanganLap->laporans->profiles->alamat!!}</td>
                            </tr>
                            <tr>
                                <td>No HP </td>
                                <td>: {!! $perkembanganLap->laporans->profiles->no_hp!!}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12" style="background-color: #e6e5e5">
                        <strong> Uraian Kejadian :</strong>
                        <br>  <br>
                        {{$perkembanganLap->laporans->uraian_kejadian}}
                        <br><br>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <strong>Pasal : <label style="font-size: medium"> {{$perkembanganLap->laporans->pasal}}</label></strong>
                    </div>
                </div>
                <br>

            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-primary btn-fill" target="_blank" href="{{url('/pelaporans/cetak/'.$perkembanganLap->laporans->id)}}"><i class="glyphicon glyphicon-print"></i> Cetak</a>
                <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{--<------------------------ MODAL --------------------}}