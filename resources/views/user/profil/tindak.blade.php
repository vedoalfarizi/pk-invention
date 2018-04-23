<table class="table table-responsive" id="tindaks-table">
    <thead>
    <tr>
        <th>No Surat</th>
        <th>Waktu Lapor</th>
        <th>Perkara</th>
        <th>Uraian</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tindaks as $tindak)
        <tr>

            {{--            {{dd($tindak)}}--}}
            <td>{!! $tindak->laporans->no_surat!!}</td>
            <td>{!! substr($tindak->laporans->waktu_lapor,0,10) !!}</td>
            <td>{!! $tindak->laporans->perkaras->nama!!}</td>
            <td>{!! substr($tindak->laporans->uraian_kejadian,0,50) !!} ...</td>
            <td>

                    <a href="{!! url('/laporan/tindak/'.$tindak->laporan_id) !!}" class='btn btn-default btn-xs'>Detail</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>