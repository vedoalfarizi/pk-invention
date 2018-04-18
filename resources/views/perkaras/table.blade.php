<table class="table table-responsive" id="perkaras-table">
    <thead>
        <tr>
            <th>Nama</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($perkaras as $perkara)
        <tr>
            <td>{!! $perkara->nama !!}</td>
            <td>
                {!! Form::open(['route' => ['perkaras.destroy', $perkara->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('perkaras.show', [$perkara->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('perkaras.edit', [$perkara->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>