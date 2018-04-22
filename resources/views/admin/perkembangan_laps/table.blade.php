<table class="table table-responsive" id="perkembanganLaps-table">
    <thead>
        <tr>
            <th>Laporan Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($perkembanganLaps as $perkembanganLap)
        <tr>
{{--            {{dd($perkembanganLap)}}--}}
            <td>{!! $perkembanganLap->laporan_id !!}</td>
            <td>
                {!! Form::open(['route' => ['perkembanganLaps.destroy', $perkembanganLap->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('perkembanganLaps.show', [$perkembanganLap->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('perkembanganLaps.edit', [$perkembanganLap->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>