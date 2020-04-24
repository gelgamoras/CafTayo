@extends('layouts.dashboard.main')

@section('page_header', 'View or Update a Period')
@section('subheader')
    <a href="javascript:history.back()" class="btn btn-secondary btn-sm mb-4" style="text-transform: none; letter-spacing: initial;">
        Back
    </a>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card card-small mb-4 pt-3">
            <div class="card-header border-bottom text-center">
                <h4 class="mb-0">{{ $period->period }}</h4> 
                <span style="font-weight: 300" class="d-block">{{ $period->start }} - {{ $period->end }}</span>
            </div>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item px-4">
                    <span class="text-muted" style="font-weight: 500;">Status: </span> 
                    {{ $period->status }} 
                </li> 
                <li class="list-group-item px-4">
                    <span class="d-block">
                        <span class="text-muted font-weight-bold">Created at: </span> 
                        {{ $period->created_at }}
                    </span>
                    <span>
                        <span class="text-muted font-weight-bold">Last updated: </span> 
                        {{ $period->updated_at }}
                    </span>
                </li>
            </ul>
        </div> 
    </div>
    <div class="col-lg-6">
        <div class="card card-small mb-4">
            <div class="card-header border-bottom" id="periods">
                <h5 class="mb-0">Update Period</h5> 
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('period.update', $period->id) }}">
                    @csrf
                    @method('PUT') 
                    <div class="form-row">
                        <div class="form-group w-100 px-1">
                            <label for="name">{{ __('Period Name') }}</label>
                            <input id="period" type="text" class="form-control @error('period') is-invalid @enderror" 
                                placeholder="Name of period" name="period" value="{{ $period->period }}" reqired autocomplete="period" autofocus>

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
                                placeholder="Time start" name="timestart" value="{{ $period->start }}" required autocomplete="timestart">

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
                                placeholder="Time end" name="timeend" value="{{ $period->end }}" required autocomplete="timeend">

                            @error('timeend')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                    </div> 
                    <div class="form-row px-1 mt-3">
                        <button type="submit" class="btn btn-sm btn-primary">Update</button> 
                    </div> 
                </form> 
            </div> 
        </div>
    </div> 
</div>

@endsection