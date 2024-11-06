@extends('layouts.auth_layout')
@section('content')
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2 text-center">
                                <h5 class="card-title pb-0 fs-4">Register Your Account</h5>
                                <p class="small">Enter your personal details to create account</p>
                            </div>

                            <form method="POST" action="" class="row g-3">
                                @csrf

                                <!-- Nama Field -->
                                <div class="col-12">
                                    <label for="yourNama" class="form-label">Nama</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="Nama" id="yourNama" class="form-control @error('Nama') is-invalid @enderror" value="{{ old('Nama') }}" required>
                                        @error('Nama')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Username Field -->
                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="username" id="yourUsername" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Password Field -->
                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" id="yourPassword" class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <!-- Password Confirmation Field -->
                                <div class="col-12">
                                    <label for="yourPasswordConfirm" class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" id="yourPasswordConfirm" class="form-control" required>
                                </div>

                                <!-- Register Button -->
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary w-100">Register</button>
                                </div>

                                <!-- Login Link -->
                                <div class="col-12 text-center">
                                    <p class="small mb-0">Already have an account? <a href="">Log in</a></p>
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
