<!DOCTYPE html>
<html lang="en">

<head>
    @include('lte3.components.header', ['title' => 'Register'])
</head>

<body class="hold-transition register-page">

    <div class="register-box">
    {{-- <pre>{{print_r(session()->all());}}</pre> --}}

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Register</b></a>
            </div>
            <div class="card-body">
                {{-- <p class="login-box-msg">Register a new membership</p> --}}

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    
                    <div class="input-group mb-3">
                      @error('name')
                          <span class="invalid-feedback " role="alert" style="display:block">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <input type="text" name="name" class="form-control" placeholder="name">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-user"></span>
                          </div>
                      </div>
                    </div>

                    <div class="input-group mb-3">
                        @error('username')
                            <span class="invalid-feedback " role="alert" style="display:block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="text" name="username" class="form-control" placeholder="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                      @error('email')
                            <span class="invalid-feedback " role="alert" style="display:block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      <input type="email" name="email" class="form-control" placeholder="Email">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                          </div>
                      </div>
                  </div>
                    
                    <div class="input-group mb-3">
                        @error('password')
                            <span class="invalid-feedback " role="alert" style="display:block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>

                    @error('password_confirmation')
                      <span class="invalid-feedback " role="alert" style="display:block">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        {{-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div> --}}
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                {{-- <div class="social-auth-links text-center">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div> --}}
                <br>

                <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    @include('lte3.components.include-js')
    
</body>

</html>



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
