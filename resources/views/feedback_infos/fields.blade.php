<!-- Status Feed Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_feed', 'Status Feed:') !!}
    {!! Form::text('status_feed', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('feedbackInfos.index') !!}" class="btn btn-default">Cancel</a>
</div>
