@extends('layouts.auth')

@section('content')
    <div class="d-flex align-items-center py-4 bg-body-tertiary" style="height: 100vh">
        <main class="form-signin w-100 m-auto">
            <form method="POST" action="{{ route('login') }}">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus id="email"
                        placeholder="name@example.com">
                    <label for="email">{{ __('Email Address') }}</label>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password" id="password" placeholder="Password">
                    <label for="password">{{ __('Password') }}</label>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-check text-start my-3">
                    {{-- <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Remember me
        </label> --}}
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
                @if (Route::has('password.request'))
                    {{ __('Don\'t have an account?') }}<a class="btn btn-link" href="{{ route('register') }}">
                        {{ __('Signup') }}
                    </a>
                @endif
                <p class="mt-5 mb-3 text-body-secondary">© 2017–2024</p>
            </form>
        </main>
    </div>
@endsection
