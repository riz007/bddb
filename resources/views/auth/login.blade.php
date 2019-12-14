@extends('layouts.common')

@section('content')
<body class="bg-gradient-success">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bangladeshi Nationals Registration System</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                  @csrf
                    <div class="form-group">
                      <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-user" name="email" value="{{ old('email') }}" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-user" id="password" placeholder="Password" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="remember" name="remember"  {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember"> {{ __('Remember Me') }}</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-user btn-block">
                        {{ __('Login') }}
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</body>
@endsection