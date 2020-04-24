@extends('layouts.guest.app')

@section('content')
<div class="row">
    <div class="col-md-4 mx-auto">
        <form method="POST" action="{{ route('login') }}" class="mt-5">
            @csrf
            <div class="form-row">
                <div class="form-group col text-center">
                    <h2>Login</h2> 
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-8 mx-auto">
                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" 
                        placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-8 mx-auto">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                        placeholder="Password" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-8 mx-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-8 mx-auto">
                    <button type="submit" class="btn btn-primary w-100">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
            @if (Route::has('password.request'))
                <div class="form-row">
                    <div class="form-group col-lg-8 mx-auto text-center">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </div>  
            @endif
        </form>
    </div>
</div>
@endsection
