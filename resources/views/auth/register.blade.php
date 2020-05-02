@extends('layouts.guest.app')

@section('content')
<div class="row">
    <div class="col-md-4 mx-auto">
        <form method="POST" action="{{ route('register') }}" class="mb-5">
            @csrf
            <div class="form-row">
                <div class="form-group col text-center">
                    <img src="{{ asset('images/icon-logo-leaf.png') }}" width="40px" />
                    <h2 class="comic-font-bold">Register</h2> 
                    Welcome to CafTayo! 
                </div>
            </div>
            <div class="form-row mt-4">
                <div class="form-group col-lg-8 mx-auto">
                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" 
                        placeholder="First Name" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-8 mx-auto">
                    <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" 
                        placeholder="Middle Name" name="middlename" value="{{ old('middlename') }}" required autocomplete="middlename">

                    @error('middlename')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-8 mx-auto">
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" 
                        placeholder="Last Name" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">

                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-8 mx-auto">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" 
                        placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" >

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-8 mx-auto">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                        placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-8 mx-auto">
                    <input id="contactno" type="text" class="form-control @error('contactno') is-invalid @enderror"
                        placeholder="Contact Number" name="contactno" value="{{ old('contactno') }}" required autocomplete="contactno">

                    @error('contactno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-8 mx-auto">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                        placeholder="Password" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-8 mx-auto">
                    <input id="password-confirm" type="password" class="form-control" 
                        placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-8 mx-auto">
                    <button type="submit" class="btn btn-primary w-100 mt-3">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
