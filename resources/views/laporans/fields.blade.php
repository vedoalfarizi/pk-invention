<!-- Waktu Lapor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu_lapor', 'Waktu Lapor:') !!}
    {!! Form::date('waktu_lapor', null, ['class' => 'form-control']) !!}
</div>

<!-- Waktu Kejadian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu_kejadian', 'Waktu Kejadian:') !!}
    {!! Form::date('waktu_kejadian', null, ['class' => 'form-control']) !!}
</div>

<!-- Tempat Kejadian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tempat_kejadian', 'Tempat Kejadian:') !!}
    {!! Form::text('tempat_kejadian', null, ['class' => 'form-control']) !!}
</div>

<!-- Korban Field -->
<div class="form-group col-sm-6">
    {!! Form::label('korban', 'Korban:') !!}
    {!! Form::text('korban', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Korban Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat_korban', 'Alamat Korban:') !!}
    {!! Form::text('alamat_korban', null, ['class' => 'form-control']) !!}
</div>

<!-- Kerugian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kerugian', 'Kerugian:') !!}
    {!! Form::text('kerugian', null, ['class' => 'form-control']) !!}
</div>

<!-- Pelapor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pelapor', 'Pelapor:') !!}
    {!! Form::text('pelapor', null, ['class' => 'form-control']) !!}
</div>

<!-- Uraian Kejadian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uraian_kejadian', 'Uraian Kejadian:') !!}
    {!! Form::text('uraian_kejadian', null, ['class' => 'form-control']) !!}
</div>

<!-- Saksi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('saksi', 'Saksi:') !!}
    {!! Form::text('saksi', null, ['class' => 'form-control']) !!}
</div>

<!-- Pasal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pasal', 'Pasal:') !!}
    {!! Form::text('pasal', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Laporan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_laporan', 'Status Laporan:') !!}
    {!! Form::text('status_laporan', null, ['class' => 'form-control']) !!}
</div>

<!-- No Surat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_surat', 'No Surat:') !!}
    {!! Form::text('no_surat', null, ['class' => 'form-control']) !!}
</div>

<!-- Lat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lat', 'Lat:') !!}
    {!! Form::text('lat', null, ['class' => 'form-control']) !!}
</div>

<!-- Long Field -->
<div class="form-group col-sm-6">
    {!! Form::label('long', 'Long:') !!}
    {!! Form::text('long', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('laporans.index') !!}" class="btn btn-default">Cancel</a>
</div>
