
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
                <h5 class="mb-0">Update a Category</h5> 
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('categories.update', ['campus' => request()->route('campus'), 'category' => $category]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="name">{{ __('Category Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name of Category" name="name" value="{{ $category->name }}" required autocomplete="name" autofocus>

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
                                <option value="0" @if($category->parent_id == null || $category->parent_id == 0) selected @endif>Parent (None)</option>
                                @foreach($index as $cat)
                                    <option value="{{ $cat->id }}" @if($category->parent_id == $cat->id) selected @endif>{{ $cat->name }}</option>
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
                            <button type="submit" class="btn btn-sm btn-primary mt-3">Update Category</button> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
