<!-- Judul Field -->
<div class="form-group col-sm-6">
    {!! Form::label('judul', 'Judul:') !!}
    {!! Form::text('judul', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Verifikasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_verifikasi', 'Status Verifikasi:') !!}
    {!! Form::text('status_verifikasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Narasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('narasi', 'Narasi:') !!}
    {!! Form::text('narasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Lat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lat', 'Lat:') !!}
    {!! Form::text('lat', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('infos.index') !!}" class="btn btn-default">Cancel</a>
</div>
