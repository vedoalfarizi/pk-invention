<table class="table table-responsive" id="penggunas-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>verifikasi</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($penggunas as $pengguna)
        <tr>
            <td>{!! $pengguna->id !!}</td>
            <td>{!! $pengguna->name !!}</td>
            <td>{!! $pengguna->email !!}</td>
            @php $profile = \App\Models\profile::where('user_id',$pengguna->id)->first();@endphp
            @if($profile!=null)
                <td> <a class='btn btn-info btn-fill' data-toggle='modal' data-target='#verifikasi-{{$profile->user_id}}'><i class="glyphicon glyphicon-eye-open"></i></a>
                </td>
                @else
                <td></td>
                @endif
            <td>
                {{--{!! Form::open(['route' => ['penggunas.destroy', $pengguna->id], 'method' => 'delete']) !!}--}}
                {{--<div class='btn-group'>--}}
                    {{--<a href="{!! route('penggunas.show', [$pengguna->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    {{--<a href="{!! route('penggunas.edit', [$pengguna->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
                    {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                {{--</div>--}}
                {{--{!! Form::close() !!}--}}
                {{--<------------------------ MODAL _ TRANSAKSI------------------->--}}
                <div class="modal fade" id="verifikasi-{{$profile->user_id}}" data-backdrop="false">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                    <div class="col-md-8">
                                        <h4>No Identitas - {{$profile->no_identitas}}</h4>
                                    </div>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-responsive">
                                            <tr><td>Nama </td><td>: {!! $pengguna->name !!}</td></tr>
                                            <tr><td>Jenis Kelamin </td><td>: {!! $profile->jekel !!}</td></tr>
                                            <tr><td>Nama </td><td>: {!! $profile->username !!}</td></tr>
                                            <tr><td>Pekerjaan </td><td>: {!! $profile->pekerjaan !!}</td></tr>
                                            <tr><td>Alamat </td><td>: {!! $profile->alamat !!}</td></tr>
                                            <tr><td>No Hp </td><td>: {!! $profile->no_hp !!}</td></tr>
                                            <tr><td>Tanggal Lahir </td><td>: {!! substr($profile->tanggal_lahir,0,10) !!}</td></tr>
                                        </table>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="service-block">
                                            <img src="{{url('storage/'.$profile->file_ktp)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <a type="button" class="btn btn-info btn-fill pull-right" href="{{url('/pengguna/verifikasi/'.$pengguna->id)}}">Verifikasi Data Pengguna </a>
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
            </td>
        </tr>
    @endforeach
    </tbody>
</table>