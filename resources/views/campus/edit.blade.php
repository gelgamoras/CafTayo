@extends('layouts.dashboard.main')

@section('page_header', 'View or Update a Campus')
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
                <h4 class="mb-0">{{ $campus->name }}</h4> 
                <span style="font-weight: 300" class="d-block">{{ $campus->address }}</span>
            </div>
            <ul class="list-group list-group-flush text-center">
                <li class="list-group-item px-4">
                    <span class="text-muted" style="font-weight: 500;">Status: </span> 
                    {{ $campus->status }} 
                </li> 
                <li class="list-group-item px-4">
                    <span class="d-block">
                        <span class="text-muted font-weight-bold">Created at: </span> 
                        {{ $campus->created_at }}
                    </span>
                    <span>
                        <span class="text-muted font-weight-bold">Last updated: </span> 
                        {{ $campus->updated_at }}
                    </span>
                </li>
            </ul>
        </div> 
    </div>
    <div class="col-lg-6">
        <div class="card card-small mb-4">
            <div class="card-header border-bottom" id="periods">
                <h5 class="mb-0">Update Campus</h5> 
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('campus.update', $campus->id) }}">
                    @csrf
                    @method('PUT') 
                    <div class="form-row">
                        <div class="form-group w-100 px-1">
                            <label for="name">{{ __('Campus Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                placeholder="Name of Campus" name="name" value="{{ $campus->name }}" reqired autocomplete="name" autofocus>

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
                                placeholder="Where is it located?" name="address" value="{{ $campus->address }}" required autocomplete="address">

                            @error('address')
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