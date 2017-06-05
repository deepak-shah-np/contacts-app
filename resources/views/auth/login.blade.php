@extends('layouts.app')

@section('content')
<div class="container">
    <div class="login">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Login</b></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label align-left">E-Mail Address</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label align-left">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>


                        </div>


                        <div class="form-group">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>


                            </div>
                        </div>

                        <hr>
                        <div class="form-group">
                            <div class="">
                                <a  href="{{ url('/auth/github') }}" class="col-md-4 btn btn-github"><i class="fa fa-github"></i> Github</a>
                                <a  href="{{ url('/auth/twitter') }}" class="col-md-4 btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                                <a  href="{{ url('/auth/facebook') }}" class="col-md-4 btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
