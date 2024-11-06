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

                            <form method="POST" action="/register/process" class="row g-3">
                                @csrf

                                <!-- Nama Field -->
                                <div class="col-12">
                                    <label for="yourNama" class="form-label">Nama</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="name" id="yourNama" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Email Field -->
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Address Type Field -->
                                <div class="col-12">
                                    <label for="address_type" class="form-label">Address Type</label>
                                    <input type="text" name="address[0][type]" id="address_type" class="form-control @error('address.0.type') is-invalid @enderror" value="{{ old('address.0.type') }}" required>
                                    @error('address.0.type')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <!-- Address Line Field -->
                                <div class="col-12">
                                    <label for="address_line" class="form-label">Address Line</label>
                                    <input type="text" name="address[0][address_line]" id="address_line" class="form-control @error('address.0.address_line') is-invalid @enderror" value="{{ old('address.0.address_line') }}" required>
                                    @error('address.0.address_line')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <!-- City Field -->
                                <div class="col-12">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" name="address[0][city]" id="city" class="form-control @error('address.0.city') is-invalid @enderror" value="{{ old('address.0.city') }}" required>
                                    @error('address.0.city')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <!-- Postal Code Field -->
                                <div class="col-12">
                                    <label for="postal_code" class="form-label">Postal Code</label>
                                    <input type="text" name="address[0][postal_code]" id="postal_code" class="form-control @error('address.0.postal_code') is-invalid @enderror" value="{{ old('address.0.postal_code') }}" required>
                                    @error('address.0.postal_code')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
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
                                <!-- <div class="col-12">
                                    <label for="yourPasswordConfirm" class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" id="yourPasswordConfirm" class="form-control" required>
                                </div> -->

                                <!-- Register Button -->
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary w-100">Register</button>
                                </div>

                                <!-- Login Link -->
                                <div class="col-12 text-center">
                                    <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
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
