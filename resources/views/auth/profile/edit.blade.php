@extends('layouts.dashboard.main')
    
@section('page_header')
    My Profile
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card mb-5">
            <div class="card-body border-bottom text-center">
                <div class="mb-3 mx-auto">
                    <img src="{{ asset('images/icon-logo-leaf.png')}}" width="200px" height="200px" style="border-radius: 100px" /> 
                </div> 
                <h2 class="mt-1 mb-3 font-weight-bold">{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</h2>  
                <h5 class="font-weight-bold text-muted d-inline-block mr-1">{{ $user->role }} </h5>
                @if($user->role == 'Concessionaire')
                    <h5 class="d-inline-block font-weight-bold"> • {{ $user->catering }}</h5> 
                    <br /> 
                    <span class="mr-3 font-weight-featherlight"> <i class="fas fa-envelope"></i> {{ $user->email }} </span>
                    <span class="font-weight-featherlight"><i class="fas fa-phone"></i> {{ $user->contactno }} </span> 
                @else 
                    <br /> 
                    <span class="mr-3 font-weight-featherlight"> <i class="fas fa-envelope"></i> {{ $user->email }} </span>
                    <span class="font-weight-featherlight"><i class="fas fa-phone"></i> {{ $user->contactno }} </span> 
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card card-small mb-5">
            <div class="card-header border-bottom">
                <h5 class="m-0">Update Account</h5> 
            </div> 
            <ul class="list-group">
                <li class="list-group-item p-3">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('dashboard.profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') 
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
                                        <label for="email">{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                            placeholder="Email Address" name="email" value="{{  old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
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
                                    <div class="form-group col-md-6">
                                        <label for="coverphoto" class="form-label">{{ __('Cover Photo') }}</label><br>
                                        <input id="coverphoto" class="form-control" type="file" class="@error('coverphoto') is-invalid @enderror" name="coverphoto">
                                        @error('coverphoto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @if($user->role == 'Concessionaire')
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="catering">{{ __('Catering Company') }}</label>
                                            <input id="catering" type="text" class="form-control @error('catering') is-invalid @enderror" 
                                                placeholder="Catering Company" name="catering" value="{{ old('catering') }}" autocomplete="catering">

                                            @error('catering')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <button type="submit" class="btn btn-sm btn-primary mt-3">Update Profile</button> 
                                    </div>
                                </div>
                            </form>     
                        </div>
                    </div>
                </li>
            </ul>
        <div>
    </div>
</div>
</div>
</div> 
@endsection

