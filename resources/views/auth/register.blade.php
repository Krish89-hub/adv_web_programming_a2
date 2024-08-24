@extends('layouts.auth')

@section('content')
    <div class="d-flex align-items-center py-4 bg-body-tertiary" style="height: 100vh">
        <div class="form-register w-100 m-auto">
            <form method="POST" action="{{ route('register') }}">
                <h1 class="h3 mb-3 fw-normal">{{ __('Register') }}</h1>
                @csrf
                <div class="form-floating">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="">
                    <label for="name">{{ __('Name') }}</label>
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror



                <div class="form-floating">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="">
                    <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                <div class="form-floating">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="">
                    <label for="password">{{ __('Password') }}</label>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                <div class="form-floating">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password" placeholder="">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                </div>

                <div class="form-floating">
                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required
                        autocomplete="new-role">
                        <option value='user'>User</option>
                        <option value='admin'>Admin</option>
                    </select>
                    <label for="role">{{ __('Role') }}</label>

                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">
                    {{ __('Register') }}
                </button>
                @if (Route::has('password.request'))
                    {{ __('Already have an account?') }}<a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                @endif
                <p class="mt-5 mb-3 text-body-secondary">© 2017–2024</p>
            </form>

        </div>
    @endsection
