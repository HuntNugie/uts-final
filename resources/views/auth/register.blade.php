@extends('layouts.app')

@section('login')
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="index.html" class="">
                        <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Admin</h3>
                    </a>
                    <h3>Register</h3>
                </div>
                <form action="{{ route("register") }}" method="post">
                    @csrf

                <div class="form-floating mb-3">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <label for="name">Nama Lengkap</label>
                </div>
                <div class="form-floating mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-4">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-4">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <label for="password_confirmation">Konfirmasi password</label>
                </div>
                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
            </form>

                <p class="text-center mb-0">Already have an Account? <a href="{{ route("login") }}">Login</a></p>
            </div>
        </div>
    </div>
</div>

@endsection
