<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=de0yosu81oosgpzndnopzqfazp450uhcr1yn5n0uuykxd1mk"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<div class="row">
    <div class="col-md-6">
        <h3>Laporan ID  {{$laporan->id}}</h3>
        <h4>Nomor : {{$laporan->no_surat}}</h4>
    </div>
    <div class="col-md-6">
        <a class="btn btn-primary pull-right" style="margin-right: 20px;margin-bottom: 5px" data-toggle='modal' data-target='#add'>+ perkembangan</a>
        <a class="btn btn-primary pull-right" style="margin-right: 20px;margin-bottom: 5px" data-toggle='modal' data-target='#detail'>Detail Laporan</a>
        <a class="btn btn-primary pull-right" style="margin-right: 20px;margin-bottom: 5px" data-toggle='modal' data-target='#berita'>+ Berita</a>
    </div>

    <hr width="100%">
</div>

@include('adminlte-templates::common.errors')
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
                                    {!! Form::model($p, ['route' => ['perkembanganLaps.update', $p->id], 'method' => 'patch', 'enctype' => 'multipart/form-data' ]) !!}

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


{{--<------------------------ MODAL _ BERITA------------------->--}}

<div class="modal fade " tabindex="-1" role="dialog" id="berita">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">

                <h5 class="modal-title">Tambahkan Berita terkait Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'beritas.store', 'files' => true ]) !!}
                {!! Form::hidden('provinsi', null, ['class' => 'form-control', 'placeholder' => 'provinsi', 'id' => 'provinsi', 'readonly']) !!}
                {!! Form::hidden('laporan_id', $laporan->id, ['class' => 'form-control']) !!}
                {!! Form::hidden('lat', $laporan->lat, ['class' => 'form-control']) !!}
                {!! Form::hidden('long', $laporan->long, ['class' => 'form-control']) !!}
                <div class="row">
                    <div class="col-md-5">
                        <div class="row"><br></div>
                        <div class="form-group col-md-12">
                            <label>Judul</label>
                            {!! Form::text('judul', null, ['class' => 'form-control', 'placeholder' => 'Judul Info & Tips']) !!}
                        </div>



                        <div class="form-group col-md-12">
                            {!! Form::file('foto_berita', null, ['class' => 'form-control']) !!}
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
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
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