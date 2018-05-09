<ul class="pagination pagination-sm inline pull-right">
    {!! $beritas->links() !!}
</ul>
<table class="table table-responsive" id="beritas-table">
    <thead>
        <tr>
        <th>Judul</th>
            <th>Laporan Id</th>

        <th>Narasi</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($beritas as $beritas)
        <tr>
            <td>{!! $beritas->judul !!}</td>
            <td> <a href="{!! route('perkembanganLaps.show', [$beritas->laporan_id]) !!}" class='btn btn-default btn-xs'>{!! $beritas->laporan_id !!}</a>
               </td>
            <td>{!! substr($beritas->narasi,0,100) !!}...</td>
            <td>
                {!! Form::open(['route' => ['beritas.destroy', $beritas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('beritas.show', [$beritas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('beritas.edit', [$beritas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
