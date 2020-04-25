@extends('layouts.dashboard.main')


@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card card-small mb-5">
            <div class="card-header border-bottom">
                <h3 class="mb-0">Change Password</h3> 
            </div>
            <div class="card-body">
            <form method="POST" action="{{ route('dashboard.password.update') }}">
                @csrf
                @method('PUT') 

                <div class="form-row">
                    <div class="form-group w-75 px-1">
                        <label for="oldpassword">{{ __('Password') }}</label>
                        <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" placeholder="Current Passowrd" name="oldpassword" required autofocus>
                        @error('oldpassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                </div> 

                <div class="form-row">
                    <div class="form-group w-75 px-1">
                        <label for="password">{{ __('New Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password" name="password" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                </div> 

                <div class="form-row">
                    <div class="form-group w-75 px-1">
                        <label for="password_confirmation">{{ __('Confirm New Password') }}</label>
                        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm New Password" name="password_confirmation" required>

                        @error('password-confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                </div> 
                <div class="form-row px-1 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary">Update Password</button> 
                </div> 
            </form>
            </div>
        </div>
    </div>
</div>
<div class="row">

</div> 
@endsection