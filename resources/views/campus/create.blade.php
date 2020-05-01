@extends('layouts.dashboard.main')

@section('subheader')
<a href="{{ route('campus.index') }}" class="btn btn-secondary btn-sm mb-2" style="text-transform: none; letter-spacing: initial;">
    Back
</a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom" id="periods">
                    <h5 class="mb-0">Campus Details</h5> 
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('campus.create') }}">
                            @csrf
                        <div class="form-row">
                            <div class="form-group w-100 px-1">
                                <label for="name">{{ __('Campus Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                    placeholder="Name of Campus" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <div class="input-note font-weight-featherlight">
                                    For maximum readability, use the abbreviated forms of campuses with long names (e.g. AKIC)
                                </div> 
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                        </div> 
                        <div class="form-row">
                            <div class="form-group w-100 px-1">
                                <label for="address">{{ __('Address') }}</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" 
                                    placeholder="Where is it located?" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                        </div> 
                        <div class="form-row px-1">
                            <button type="submit" class="btn btn-sm btn-primary mt-3">Add Campus</button> 
                        </div> 
                    </form> 
                </div> 
            </div>
        </div> 
    </div>
@endsection