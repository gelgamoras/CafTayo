@extends('layouts.dashboard.main')

@section('subheader')
    <a href="{{ route('food.index', $campus) }}" class="btn btn-secondary btn-sm mb-2" style="text-transform: none; letter-spacing: initial;">
        Back
    </a>
@endsection

@section('content')
<div class="row">
        <div class="col-lg-8">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h5 class="m-0">Add Food</h5> 
                </div> 
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col">
                            <form method="POST" action="{{ route('food.store', request()->route('campus')) }}" enctype="multipart/form-data">
                                @csrf  
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name">{{ __('Food Name') }}</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name of Food" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <div class="input-note error-message">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                    </div> 
                                    <div class="form-row">
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-4 mb-0">
                                            <label for="category">Category</label> 
                                            <select id="category" name="category" class="form-control {{($errors->has('category') ? 'input-error' : '')}}" id="category">
                                                <option disabled selected>Choose a category</option>
                                                @foreach($categories as $category)
                                                    @if($category->parent_id == null)
                                                        <option value="{{ $category->id }}">{{$category->name}}</option>
                                                    @else 
                                                        @foreach($categories as $p_category)
                                                            @if($p_category->id == $category->parent_id)
                                                                <option value="{{ $category->id }}">{{ $p_category->name }}\{{$category->name}}</option> 
                                                            @endif
                                                        @endforeach 
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <div class="input-note error-message">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-8 mb-0">
                                            <label for="shortDescription">{{ __('Short Description') }}</label>
                                            <input id="shortDescription" type="text" class="form-control @error('shortDescription') is-invalid @enderror" placeholder="Say a few words about this dish" name="shortDescription" value="{{ old('shortDescription') }}" required autocomplete="shortDescription">
                                            <div class="input-note">Max. 150 characters</div>
                                            @error('shortDescription')
                                                <div class="input-note error-message">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="ingredients">{{ __('Ingredients') }}</label>
                                            <textarea class="form-control {{($errors->has('ingredients') ? 'input-error' : '')}}" name="ingredients" id="ingredients" rows="3" placeholder="What are in this dish?">@if(old('ingredients')) {{old('ingredients')}} @endif</textarea>
                                            <div class="input-note">
                                                Separate by comma (ex. Potato, Chicken, Spinach...)
                                            </div> 
                                            @error('ingredients')
                                                <div class="input-note error-message">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="calories">{{ __('Calories') }}</label> 
                                            <div class="input-group">
                                                <input type="number" name="calories" class="form-control {{($errors->has('calories') ? 'input-error' : '')}}" id="calories"
                                                placeholder="Calories" value="{{ old('calories') }}" min="0"/> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text">cal</span>
                                                </div> 
                                            </div> 
                                            @error('calories')
                                                <div class="input-note error-message">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                        <div class="form-group col-md-3">
                                            <label for="price">{{ __('Price') }}</label> 
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">₱</span> 
                                                </div> 
                                                <input type="number" name="price" class="form-control {{($errors->has('price') ? 'input-error' : '')}}" id="price"
                                                    placeholder="How much is it?" step=0.01 value="{{ old('price') }}" min="0"/> 
                                            </div> 
                                            @error('price')
                                                <div class="input-note error-message">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                        <div class="form-group col-md-2">
                                            <fieldset class="ml-2 mt-4 d-inline-block">
                                            <div class="custom-control custom-checkbox d-block my-2">
                                                <input type="checkbox" class="custom-control-input" id="halal" value="Halal" name="ishalal" {{ old('halal') == 'Halal' ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="halal">{{ __('Halal Food') }}</label>
                                            </div>
                                            </fieldset>
                                        </div> 
                                        <div class="form-group col-md-4">
                                            <label for="coverphoto">{{ __('Cover Photo') }}</label><br>
                                            <input id="coverphoto" class="form-control" type="file" class="@error('coverphoto') is-invalid @enderror" name="coverphoto">
                                            @error('coverphoto')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="description">Description</label>
                                            <textarea class="form-control {{($errors->has('description') ? 'input-error' : '')}}" name="description" id="description" rows="5" placeholder="Tell us more about this dish">@if(old('description')) {{old('description')}} @endif</textarea> 
                                            <div class="input-note">Max. 250 characters</div>
                                            @error('description')
                                                <div class="input-note error-message">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                    </div> 
                                    <button type="submit" class="btn btn-primary">Save</button> 
                                </form> 
                            </div> 
                        </div> 
                    </li> 
                </ul> 
            </div>
        </div>  
    </div> 
@endsection
