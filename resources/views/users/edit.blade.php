@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card card-small mb-4 pt-3">
            <div class="card-header border-bottom text-center">
                <h4 class="mb-0">{{ $user->firstname }} {{ $user->lastname }}</h4> 
                <span class="text-muted d-block">{{ $user->role }}</span>
                <span style="font-weight: 300" class="d-block">{{ $user->catering }}</span>
            </div>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item px-4">
                    <i class="fas fa-envelope"></i>
                    <span>{{ $user->email }}</span>
                    <i class="fas fa-phone ml-3"></i>
                    <span>{{ $user->contactno }}</span>
                </li> 
                <li class="list-group-item px-4 d-flex justify-content-between" style="font-size: 0.7rem">
                    <span class="d-inine-block">
                        <span class="text-muted font-weight-bold">Created at: </span> 
                        {{ $user->created_at }}
                    </span>
                    <span class="d-inine-block">
                        <span class="text-muted font-weight-bold">Last updated: </span> 
                        {{ $user->updated_at }}
                    </span>
                </li>
            </ul>
        </div> 
    </div>
    <div class="col-lg-8">
        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h5 class="m-0">Update User</h5> 
            </div> 
            <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="firstname">{{ __('First Name') }}</label>
                                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" 
                                        placeholder="First Name" name="firstname" value="{{ $user->firstname }}" required autocomplete="firstname" autofocus>

                                        @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> 
                                    <div class="form-group col-md-4">
                                        <label for="middlename" >{{ __('Middle Name') }}</label>
                                        <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" 
                                            placeholder="Middle Name" name="middlename" value="{{ $user->middlename }}" required autocomplete="middlename">

                                        @error('middlename')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> 
                                    <div class="form-group col-md-4">
                                        <label for="lastname">{{ __('Last Name') }}</label>
                                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" 
                                            placeholder="Last Name" name="lastname" value="{{ $user->lastname }}" required autocomplete="lastname">

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
                                            placeholder="Username" name="username" value="{{ $user->username }}" required autocomplete="username">

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <label for="role">{{ __('User Role') }}</label>
                                        <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                                            <option value="" disabled>Select Role...</option>
                                            <option value="Admin" @if($user->role == 'Admin') selected @endif>Admin</option>
                                            <option value="Concessionaire" @if($user->role == 'Concessionaire') selected @endif>Concessionaire</option>
                                        </select>

                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> 
                                @if($user->role == 'Concessionaire')
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="catering">{{ __('Catering Company') }}</label>
                                            <input id="catering" type="text" class="form-control @error('catering') is-invalid @enderror" 
                                                placeholder="Catering Company" name="catering" value="{{ $user->catering }}" autocomplete="catering">

                                            @error('catering')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                        <div class="form-group col-md-8">
                                            <label for="campuses">{{ __('Campuses') }}</label>
                                            <input id="campuses" type="text" class="form-control @error('campuses') is-invalid @enderror" 
                                                placeholder="Campuses" name="campuses" value="{{ $user->campuses }}" autocomplete="campuses">

                                            @error('campuses')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                    </div> 
                                @endif 
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="email" >{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                            placeholder="Email Address" name="email" value="{{ $user->email }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> 
                                    <div class="form-group col-md-4">
                                        <label for="contactno">{{ __('Contact Number') }}</label>
                                        <input id="contactno" type="text" class="form-control @error('contactno') is-invalid @enderror" 
                                            placeholder="Contact Number" name="contactno" value="{{ $user->contactno }}" required autocomplete="contactno">

                                        @error('contactno')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>  
                                </div> 
                                <button type="submit" class="btn btn-primary mt-3">Update User</button> 
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



