<form method="POST" action="{{ route('dashboard.profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT') 

    <div class="form-group col-md-4">
        <label for="firstname">{{ __('First Name') }}</label>
        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" 
            name="firstname" value="{{ old('firstname') }}" placeholder="First Name" required autocomplete="firstname" autofocus>
        @error('firstname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div> 
    <div class="form-group col-md-4">
        <label for="middlename">{{ __('Middle Name') }}</label>
        <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" 
            name="middlename" value="{{ old('middlename') }}" placeholder="Middle Name" required autocomplete="middlename">

        @error('middlename')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div> 
    <div class="form-group col-md-4">
        <label for="lastname">{{ __('Last Name') }}</label>
        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" 
            placeholder="Last Name" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">

        @error('lastname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div> 

    <div class="form-group col-md-4">
        <label for="catering">{{ __('Catering Company') }}</label>
        <input id="catering" type="text" class="form-control @error('catering') is-invalid @enderror" 
            placeholder="Catering Company" name="catering" value="{{ old('catering') }}" autocomplete="catering">

        @error('catering')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div> 

    <div class="form-group col-md-4">
        <label for="email">{{ __('Email') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
            placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-md-4">
        <label for="contactno">{{ __('Contact Number') }}</label>
        <input id="contactno" type="text" class="form-control @error('contactno') is-invalid @enderror" 
            placeholder="Contact Number" name="contactno" value="{{ old('contactno') }}" required autocomplete="contactno">

        @error('contactno')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="coverphoto" class="form-label">{{ __('Cover Photo') }}</label><br>
        <input id="coverphoto" type="file" class="@error('coverphoto') is-invalid @enderror" name="coverphoto">
        @error('coverphoto')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-row px-1 mt-3">
        <button type="submit" class="btn btn-sm btn-primary">Update Profile</button> 
    </div> 
</form>