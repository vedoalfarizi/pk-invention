@extends('app')
@section('content')
<div class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="hero-section-caption pinside40 text-center">
                    <form method="post" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong class="regist-label">{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong class="regist-label">{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong class="regist-label">{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                            <strong class="regist-label">{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <button id="singlebutton" name="singlebutton" class="btn btn-primary btn-sm" type="submit">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <a href="{{ url('/login') }}" class="reply-link">Saya udah punya akun</a>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.login-box -->

@endsection