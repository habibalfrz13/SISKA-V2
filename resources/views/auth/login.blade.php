@extends('layouts.app')

@section('content')
<section class="vh-100">
    <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-6 col-lg-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-6 col-lg-5 offset-lg-1">
        <form method="POST" action="{{ route('login') }}" class="py-3">
          @csrf
          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="email">Email address</label>
            <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
              placeholder="Enter a valid email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
              <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </div>
            @enderror
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
              placeholder="Enter password" required autocomplete="current-password">
            @error('password')
              <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </div>
            @enderror
          </div>

          <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">
                Remember me
              </label>
            </div>
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="text-body">Forgot password?</a>
            @endif
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('register') }}"
                class="link-danger">Register</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
