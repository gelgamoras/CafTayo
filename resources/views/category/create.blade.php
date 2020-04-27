
@extends('layouts.dashboard.main')


@section('subheader')
<a href="javascript:history.back()" class="btn btn-secondary btn-sm mb-2" style="text-transform: none; letter-spacing: initial;">
    Back
</a>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card card-small mb-4">
            <div class="card-header border-bottom">
                <h5 class="mb-0">Create a Category</h5> 
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('categories.store', request()->route('campus')) }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="name">{{ __('Category Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name of Category" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="parent">{{ __('Parent') }}</label>
           
                            <select id="parent" name="parent" class="form-control @error('parent') is-invalid @enderror" required>
                                <option value="0" selected>Parent (None)</option>
                                @foreach($index as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                </select>
                        
                            @error('parent')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <button type="submit" class="btn btn-sm btn-primary mt-3">Add Category</button> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
