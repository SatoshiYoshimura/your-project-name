{{ Form::open() }}
<p>
{{ Form::label('username', 'ユーザー名') }}
{{ Form::text('username', Input::old('username', '')) }}
@if ($errors->has('username'))
    {{ $errors->first('username') }}
@endif
</p>
<p>
{{ Form::label('password', 'パスワード') }}
{{ Form::password('password') }}
@if ($errors->has('password'))
    {{ $errors->first('password') }}
@endif
</p>
<p>
{{ Form::label('email', 'メール') }}
{{ Form::text('email', Input::old('email', '')) }}
@if ($errors->has('email'))
    {{ $errors->first('email') }}
@endif
</p>
{{ Form::submit('登録') }}
{{ Form::token() }}
{{ Form::close() }}
