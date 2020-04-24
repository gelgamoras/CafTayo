@extends('layouts.dashboard.main')

@section('page_header', 'Create a Period')
@section('subheader')
<a href="{{ route('period.index') }}" class="btn btn-secondary btn-sm mb-2" style="text-transform: none; letter-spacing: initial;">
    Back
</a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom" id="periods">
                    <h5 class="mb-0">Period Details</h5> 
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('campus.create') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group w-100 px-1">
                                <label for="name">{{ __('Period Name') }}</label>
                                <input id="period" type="text" class="form-control @error('period') is-invalid @enderror" 
                                    placeholder="Name of period" name="period" value="{{ old('period') }}" reqired autocomplete="period" autofocus>

                                @error('period')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                        </div> 
                        <div class="form-row">
                            <div class="form-group w-100 px-1">
                                <label for="timestart">{{ __('Time Start') }}</label>
                                <input id="timestart" type="time" class="form-control @error('timestart') is-invalid @enderror" 
                                    placeholder="Time start" name="timestart" value="{{ old('timestart') }}" required autocomplete="timestart">

                                @error('timestart')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                        </div> 
                        <div class="form-row">
                            <div class="form-group w-100 px-1">
                                <label for="timeend">{{ __('Time End') }}</label>
                                <input id="timeend" type="time" class="form-control @error('timeend') is-invalid @enderror" 
                                    placeholder="Time end" name="timeend" value="{{ old('timeend') }}" required autocomplete="timeend">

                                @error('timeend')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                        </div> 
                        <div class="form-row px-1">
                            <button type="submit" class="btn btn-sm btn-primary">Add Period</button> 
                        </div> 
                    </form> 
                </div> 
            </div>
        </div> 
    </div>
@endsection