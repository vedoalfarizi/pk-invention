@extends('app')
@section('content')
    <div class="bg-default space-small">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-xs-1">
                    <br><br><br><br><br><br>
                    <img src="{{asset('images/pk.png')}}">
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left" style="padding-left: 10%">
                    <div class="hero-section-caption pinside40 text-center" style="background-color: #4d8638; padding: 5%">
                        <form method="post" action="{{ url('/login') }}">
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="regist-label" for="email">Email</label>
                                        <input id="email" name="email" type="email" class="form-control">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong class="regist-label">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="regist-label" for="email">Password</label>
                                        <input id="password" name="password" type="password" class="form-control">
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong class="regist-label">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <button id="singlebutton" name="singlebutton" class="btn btn-primary btn-sm" type="submit">Masuk</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <a href="{{ url('/register') }}" class="reply-link">Belum Punya akun? Daftar</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <!-- /.login-box -->

    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/menumaker.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('js/jquery.sticky.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sticky-header.js')}}"></script>
</body>
</html>
