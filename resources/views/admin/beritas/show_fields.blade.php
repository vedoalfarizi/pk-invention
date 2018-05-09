<!-- Laporan Id Field -->
<div class="col-md-3">
    {!! Form::label('laporan_id', 'Laporan Id:') !!}
    <p>{!! $beritas->laporan_id !!}</p>
    {!! Form::label('judul', 'Judul:') !!}
    <p>{!! $beritas->judul !!}</p>
    {!! Form::label('narasi', 'Narasi:') !!}
    <p>{!! $beritas->narasi !!}</p>
    {!! Form::label('lat', 'Lat:') !!}
    <p>{!! $beritas->lat !!}</p>
    {!! Form::label('long', 'Long:') !!}
    <p>{!! $beritas->long !!}</p>
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $beritas->created_at !!}</p>
</div>

<!-- Foto Berita Field -->
<div class="col-md-5">
    {!! Form::label('foto_berita', 'Foto Berita:') !!}
    <img src="{{url('storage/'.$beritas->foto_berita)}}" class="img-responsive">
</div>

<!-- Narasi Field -->
<div class="col-md-12">
    {!! Form::label('narasi', 'Narasi:') !!}
    <p>{!! $beritas->narasi !!}</p>
</div>


