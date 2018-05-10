@extends('app')
@section('content')
<div style="background-color:#f7f6f1">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-xs-3">
                <br><br><br><br><br><br>
                <img src="{{asset('images/pk.png')}}">
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left" style="padding-left: 10%">
                <div class="hero-section-caption pinside40 text-center" style="background-color: #4d8638; padding: 5%">
                    <form method="post" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Username">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong class="regist-label">{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong class="regist-label">{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong class="regist-label">{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                            <strong class="regist-label">{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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