@extends('layouts.guest.app')

@section('content')
<div class="row">
    <div class="col-md-4 mx-auto">
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="form-row">
                <div class="form-group col text-center">
                    <h2 class="font-weight-bold mt-5 mb-4" style="line-height: 3.2rem;">{{ __('I forgot my password! 😰') }}</h2> 
                    Don't sweat it, just provide your account's email address and we'll send you a password reset link.
                </div>
            </div>
            <div class="form-row my-3">
                <div class="form-group col">
                    <input id="email" type="email" style="font-size: 1.4rem" placeholder="you@email.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 mx-auto mt-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div> 
@endsection
