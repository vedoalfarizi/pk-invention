@php $user= auth::user();
$profile =\App\Models\profile::where('user_id',$user->id)->first();@endphp
@if($profile==null)
    {!! Form::open(['route' => 'profiles.store', 'files' => true]) !!}

    @include('profiles.fields')

    {!! Form::close() !!}

    @else

    {!! Form::model($profile, ['route' => ['profiles.update' ,$profile->user_id], 'files' => true, 'method' => 'patch']) !!}


    <div class="form-group col-sm-12">
        <h4 class="text-danger">Pastikan data Anda sudah sesuai dengan data di KTP</h4>
    </div>
    <!-- Jekel Field -->
    {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}

    <div class="form-group col-sm-3">
        {!! Form::label('jekel', 'Jenis Kelamin:') !!}
        {!! Form::select('jekel', ['0' => 'Laki-laki', '1' => 'Perempuan'], $profile->jekel, ['class' => 'form-control']) !!}
    </div>

    <!-- Username Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('username', 'Nama Lengkap:') !!}
        {!! Form::text('username', $profile->usename, ['class' => 'form-control']) !!}
    </div>

    <!-- Pekerjaan Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('pekerjaan', 'Pekerjaan:') !!}
        {!! Form::text('pekerjaan', $profile->pekerjaan, ['class' => 'form-control']) !!}
    </div>

    <!-- No Hp Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('no_hp', 'No Hp:') !!}
        {!! Form::text('no_hp', $profile->no_hp, ['class' => 'form-control']) !!}
    </div>

    <!-- Tanggal Lahir Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
        {!! Form::date('tanggal_lahir', $profile->tanggal_lahir, ['class' => 'form-control', 'id' => 'myDate']) !!}
    </div>

    <!-- No Identitas Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('no_identitas', 'No Identitas:') !!}
        {!! Form::text('no_identitas', $profile->no_identitas, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-3">
        {!! Form::label('tempat_lahir', 'Tempat Lahir:') !!}
        {!! Form::text('tempat_lahir', $profile->tempat_lahir, ['class' => 'form-control']) !!}
    </div>

    <!-- File Ktp Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('file_ktp', 'Scan KTP:') !!}
        {!! Form::file('file_ktp', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Alamat Field -->
    <div class="form-group col-sm-8">
        {!! Form::label('alamat', 'Alamat:') !!}
        {!! Form::text('alamat', $profile->alamat, ['class' => 'form-control']) !!}
    </div>



    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}
@endif
