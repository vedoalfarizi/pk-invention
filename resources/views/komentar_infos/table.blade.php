<table class="table table-responsive" id="komentarInfos-table">
    <thead>
        <tr>
            <th>Info Id</th>
        <th>User Id</th>
        <th>Komentar</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($komentarInfos as $komentarInfo)
        <tr>
            <td>{!! $komentarInfo->info_id !!}</td>
            <td>{!! $komentarInfo->user_id !!}</td>
            <td>{!! $komentarInfo->komentar !!}</td>
            <td>
                {!! Form::open(['route' => ['komentarInfos.destroy', $komentarInfo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('komentarInfos.show', [$komentarInfo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('komentarInfos.edit', [$komentarInfo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>