{!! Form::hidden('provinsi', null, ['class' => 'form-control', 'placeholder' => 'provinsi', 'id' => 'provinsi', 'readonly']) !!}
{!! Form::hidden('laporan_id', $beritas->laporan_id, ['class' => 'form-control']) !!}
{!! Form::hidden('lat', $beritas->lat, ['class' => 'form-control']) !!}
{!! Form::hidden('long', $beritas->long, ['class' => 'form-control']) !!}
<div class="row">
    <div class="col-md-12">
        <div class="form-group col-md-6">
            <label>Judul</label>
            {!! Form::text('judul', $beritas->judul, ['class' => 'form-control', 'placeholder' => $beritas->judul]) !!}
        </div>

        <div class="form-group col-md-6">
            Foto Pendukung
            {!! Form::file('foto_berita', null, ['class' => 'form-control']) !!}
        </div>
    <div class="col-md-12">
        Narasi
        {!! Form::textarea('narasi', $beritas->narasi, ['class' => 'form-control', 'placeholder' => $beritas->narasi]) !!}
    </div>
    </div>
</div>
<br>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('beritas.index') !!}" class="btn btn-default">Cancel</a>
</div>
