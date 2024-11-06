@extends('layouts.auth_layout')
@section('content')
<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Register Your Account</h5>
                  <p class="text-center small">Enter your personal details to create account</p>
                </div>

                <form class="row g-3" method="POST" action="">
                  @csrf
                  <div class="col-12">
                    <label for="yourNama" class="form-label">Nama</label>
                    <div class="input-group has-validation">
                      <input type="text" name="Nama" class="form-control @error('Nama') is-invalid @enderror"  value="{{ old('Nama') }}" id="yourNama" required>
                      @error('Nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"  value="{{ old('username') }}" id="yourUsername" required>
                      @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="col-12">
                    <label for="yourPasswordConfirm" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="yourPasswordConfirm" required>
                  </div>

                  <div class="col-12 mt-5">
                    <button class="btn btn-primary w-100" type="submit">Register</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Already have account? <a href="{{ route('login') }}">Log in</a></p>
                  </div>
                </form>

              </div>
            </div>


          </div>
        </div>
      </div>

    </section>

  </div>
@endsection
