{{ Form::open() }}
<p>
{{ Form::label('title', 'title') }}
{{ Form::text('title', Input::old('title', '')) }}
@if ($errors->has('title'))
    {{ $errors->first('title') }}
@endif
</p>
<p>
{{ Form::label('body', 'ほんぶん') }}
{{ Form::text('body') }}
@if ($errors->has('body'))
    {{ $errors->first('body') }}
@endif
</p>
<p>
</p>
{{ Form::submit('登録') }}
{{ Form::token() }}
{{ Form::close() }}
