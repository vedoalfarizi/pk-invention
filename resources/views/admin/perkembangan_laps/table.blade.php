<table class="table table-responsive" id="perkembanganLaps-table">
    <thead>
        <tr>
            <th>Laporan Id</th>
            <th>Waktu kejadian</th>
            <th>Perkara</th>
            <th>Pelapor</th>
        </tr>
    </thead>
    <tbody>

    @foreach($tindaks as $perkembanganLap)
        <tr>
{{--            {{dd($perkembanganLap)}}--}}
            <td>{!! $perkembanganLap->laporan_id !!}</td>
            <td>{!! substr($perkembanganLap->laporans->waktu_kejadian,0,10) !!}</td>
            <td>{!! $perkembanganLap->laporans->perkaras->nama !!}
            <td>{!! $perkembanganLap->laporans->users->name !!}</td>
            <td>
{{--                {!! Form::open(['route' => ['perkembanganLaps.destroy', $perkembanganLap->id], 'method' => 'delete']) !!}--}}
                <div class='btn-group'>
                    <a href="{!! route('perkembanganLaps.show', [$perkembanganLap->laporan_id]) !!}" class='btn btn-default btn-fill'><i class="glyphicon glyphicon-eye-open"></i> LIHAT </a>
{{--                    <a href="{!! route('perkembanganLaps.edit', [$perkembanganLap->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
{{--                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                </div>
                {{--{!! Form::close() !!}--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>