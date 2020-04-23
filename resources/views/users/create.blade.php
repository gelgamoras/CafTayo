@extends('layouts.main')

@section('page_header', 'Create a User')
@section('subheader')
<a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm mb-2" style="text-transform: none; letter-spacing: initial;">
    Back
</a>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h5 class="m-0">Account Details</h5> 
            </div> 
            <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('users.create') }}">
                                @csrf
                                <div class="form-row">
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
                                </div> 
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="username">{{ __('Username') }}</label>
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" 
                                            placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username">

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <label for="role">{{ __('User Role') }}</label>
                                        <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                                            <option value="" disabled selected>Select Role...</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Concessionaire">Concessionaire</option>
                                        </select>

                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> 
                                <div class="form-row">                                    
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
                                </div> 
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="campuses">{{ __('Campuses') }}</label>
                                        <input id="campuses" type="text" class="form-control @error('campuses') is-invalid @enderror" 
                                            placeholder="Campuses" name="campuses" value="{{ old('campuses') }}" autocomplete="campuses">

                                        @error('campuses')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div id="campus" style="position:relative"></div>
                                    </div> 
                                </div> 
                                <button type="submit" class="btn btn-primary mt-3">Create User</button> 
                            </form> 
                        </div> 
                    </div> 
                </li> 
            </ul> 
        </div>
    </div>  
</div> 
@endsection

@section('scripts')
    <script src="{{ asset('js/campusUser.js') }}" defer></script>
@endsection



