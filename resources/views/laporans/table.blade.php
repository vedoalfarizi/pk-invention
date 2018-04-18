<table class="table table-responsive" id="laporans-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Waktu Lapor</th>
        <th>Perkara Id</th>
        <th>Waktu Kejadian</th>
        <th>Tempat Kejadian</th>
        <th>Korban</th>
        <th>Alamat Korban</th>
        <th>Kerugian</th>
        <th>Pelapor</th>
        <th>Uraian Kejadian</th>
        <th>Saksi</th>
        <th>Pasal</th>
        <th>Status Laporan</th>
        <th>No Surat</th>
        <th>Lat</th>
        <th>Long</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($laporans as $laporan)
        <tr>
            <td>{!! $laporan->user_id !!}</td>
            <td>{!! $laporan->waktu_lapor !!}</td>
            <td>{!! $laporan->perkara_id !!}</td>
            <td>{!! $laporan->waktu_kejadian !!}</td>
            <td>{!! $laporan->tempat_kejadian !!}</td>
            <td>{!! $laporan->korban !!}</td>
            <td>{!! $laporan->alamat_korban !!}</td>
            <td>{!! $laporan->kerugian !!}</td>
            <td>{!! $laporan->pelapor !!}</td>
            <td>{!! $laporan->uraian_kejadian !!}</td>
            <td>{!! $laporan->saksi !!}</td>
            <td>{!! $laporan->pasal !!}</td>
            <td>{!! $laporan->status_laporan !!}</td>
            <td>{!! $laporan->no_surat !!}</td>
            <td>{!! $laporan->lat !!}</td>
            <td>{!! $laporan->long !!}</td>
            <td>
                {!! Form::open(['route' => ['laporans.destroy', $laporan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('laporans.show', [$laporan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('laporans.edit', [$laporan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>