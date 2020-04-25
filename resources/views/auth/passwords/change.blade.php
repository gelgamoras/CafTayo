<form method="POST" action="{{ route('dashboard.profile.update') }}">
    @csrf
    @method('PUT') 

    <div class="form-row">
        <div class="form-group w-100 px-1">
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
        <div class="form-group w-100 px-1">
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
        <div class="form-group w-100 px-1">
            <label for="password-confirm">{{ __('Confirm New Password') }}</label>
            <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" placeholder="Confirm New Password" name="password-confirm" required>

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