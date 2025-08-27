<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="icon" href="{{ getGlobalFilePath('/upload/setting/', getSettingValue('favicon_icon')) }}" type="image/png" sizes="16x16">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Reset Password | Sample Project</title>
  @include('adminTheme.style')
</head>

<body class="bg-dark">
  <div class="main-content">
    <div class="header bg-gradient-light py-2 py-lg-5">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <img src="{{ getGlobalFilePath('/upload/setting/', getSettingValue('logo')) }}" width="150" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="50" y="0" viewBox="0 0 2560 100">
          <polygon class="fill-dark" points="250 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>

    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-4 pb-lg-3 mt-3">
              <p class="text-center">Reset your password below.</p>

              <!-- Validation Errors -->
              @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      @foreach ($errors->all() as $error)
                          {{ $error }}<br>
                      @endforeach
                  </div>
              @endif

              <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email -->
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email"
                           value="{{ old('email', $request->email) }}" required autofocus>
                  </div>
                </div>

                <!-- Password -->
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="New Password" type="password" name="password" required>
                  </div>
                </div>

                <!-- Confirm Password -->
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" required>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">
                    Reset Password
                  </button>
                </div>
              </form>

              <div class="row mt-3">
                <div class="col-6">
                  <a href="{{ route('login') }}" class="text-light"><small>Back to login</small></a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2025 Sample Project
          </div>
        </div>
      </div>
    </div>
  </footer>

  @include('adminTheme.script')
</body>
</html>
