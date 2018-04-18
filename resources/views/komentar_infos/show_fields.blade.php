<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $komentarInfo->id !!}</p>
</div>

<!-- Info Id Field -->
<div class="form-group">
    {!! Form::label('info_id', 'Info Id:') !!}
    <p>{!! $komentarInfo->info_id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $komentarInfo->user_id !!}</p>
</div>

<!-- Komentar Field -->
<div class="form-group">
    {!! Form::label('komentar', 'Komentar:') !!}
    <p>{!! $komentarInfo->komentar !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $komentarInfo->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $komentarInfo->updated_at !!}</p>
</div>

