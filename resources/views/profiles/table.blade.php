<table class="table table-responsive" id="profiles-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Jekel</th>
        <th>Username</th>
        <th>Pekerjaan</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>File Ktp</th>
        <th>Tanggal Lahir</th>
        <th>No Identitas</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($profiles as $profile)
        <tr>
            <td>{!! $profile->user_id !!}</td>
            <td>{!! $profile->jekel !!}</td>
            <td>{!! $profile->username !!}</td>
            <td>{!! $profile->pekerjaan !!}</td>
            <td>{!! $profile->alamat !!}</td>
            <td>{!! $profile->no_hp !!}</td>
            <td>{!! $profile->file_ktp !!}</td>
            <td>{!! $profile->tanggal_lahir !!}</td>
            <td>{!! $profile->no_identitas !!}</td>
            <td>
                {!! Form::open(['route' => ['profiles.destroy', $profile->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('profiles.show', [$profile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('profiles.edit', [$profile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>