<div class="row">
    <div class="col-md-6">
        <img src="{{asset('storage/'.$info->file_foto)}}" width="500px"></p>
    </div>
    <div class="col-md-6">
        <table class="table table-responsive">
            <!-- Id Field -->

            <tr>
                <td>
                    {!! Form::label('judul', 'Judul:') !!}
                </td>
                <td>
                    <p>{!! $info->judul !!}</p>
                </td>
            </tr>

            <tr>
                <td>
                    {!! Form::label('perkara_id', 'Perkara Id:') !!}

                </td>
                <td>
                    <p>{!! $info->perkara_id !!}</p>
                </td>
            </tr>
            <tr>
                <td>
                    {!! Form::label('status_verifikasi', 'Status Verifikasi:') !!}
                </td>
                <td>
                   <p>{!! $info->status_verifikasi !!}</p>
                </td>
            </tr>



            <tr>
                <td>
                    {!! Form::label('lat', 'Lat:') !!}
                </td>
                <td>
                    <p>{!! $info->lat !!}</p>
                </td>
            </tr>
            <tr>
                <td>
                    {!! Form::label('created_at', 'Created At:') !!}
                </td>
                <td>
                    <p>{!! $info->created_at !!}</p>
                </td>
            </tr>


        </table>

    </div>
</div>
        {!! Form::label('narasi', 'Narasi:') !!}
        <p>{!! $info->narasi !!}</p>
