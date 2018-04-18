<table class="table table-responsive" id="feedbackInfos-table">
    <thead>
        <tr>
            <th>Info Id</th>
        <th>Status Feed</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($feedbackInfos as $feedbackInfo)
        <tr>
            <td>{!! $feedbackInfo->info_id !!}</td>
            <td>{!! $feedbackInfo->status_feed !!}</td>
            <td>
                {!! Form::open(['route' => ['feedbackInfos.destroy', $feedbackInfo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('feedbackInfos.show', [$feedbackInfo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('feedbackInfos.edit', [$feedbackInfo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>