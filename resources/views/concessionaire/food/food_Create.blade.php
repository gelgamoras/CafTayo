@extends('layouts.concessionaire.main')

@section('page_header')
    New Food 
@endsection

@section('subheader')
    
@endsection

@section('page_top_buttons')

@endsection

@section('content')
<style>
    .error-message {
        color: #D63447; 
    }
    .input-error {
        border: 1px solid rgba( 214,52,71, 0.7); 
        box-shadow: 0px 0px 8px rgba( 214,52,71, 0.5); 
        background-color: rgba( 255,150,162, 0.1); 
    }
</style>
<div class="row">
        <div class="col-lg-8">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h5 class="m-0">Food Details</h5> 
                </div> 
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col">
                                <form action="" method="post">
                                {{ csrf_field() }}  
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="foodName">Food name</label> 
                                            <input type="text" name="foodName" class="form-control {{($errors->has('foodName') ? 'input-error' : '')}}" id="foodName" 
                                                placeholder="What is it called?" value="{{ old('foodName') }}" /> 
                                            @error('foodName')
                                                <div class="input-note error-message">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                    </div> 
                                    <div class="form-row">
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="short">Short Description</label> 
                                            <input type="text" name="short" class="form-control {{($errors->has('short') ? 'input-error' : '')}}" id="short"
                                                placeholder="Say a few words about this dish" value="{{ old('short') }}" /> 
                                            <div class="input-note">Max. 150 characters</div>
                                            @error('short')
                                                <div class="input-note error-message">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                        <div class="form-group col-md-3">
                                            <label for="category">Category</label> 
                                            <select id="category" name="category" class="form-control {{($errors->has('category') ? 'input-error' : '')}}" id="category">
                                                @if(old('category'))
                                                    <option selected>{{ old('category') }}</option>
                                                @else
                                                    <option disabled selected>Choose a category</option>
                                                @endif
                                                <option>Ulam</option> 
                                                <option>Quick Bites</option> 
                                                <option>Sweet Delights</option> 
                                                <option>Meryenda</option> 
                                                <option>Drinks</option> 
                                            </select>
                                            @error('category')
                                                <div class="input-note error-message">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="subcategory">Subcategory</label> 
                                            <input type="text" name="subcategory" class="form-control {{($errors->has('subcategory') ? 'input-error' : '')}}" id="subcategory"
                                                placeholder="Subcategory" value="{{ old('subcategory') }}" /> 
                                            @error('subcategory')
                                                <div class="input-note error-message">{{ $message }}</div>
                                            @enderror
                                        </div> 
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="ingredients">Ingredients</label>
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
                                            <label for="calories">Calories</label> 
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
                                            <label for="price">Price</label> 
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
                                        <div class="form-group col-md-3">
                                            <div class="custom-control custom-checbox mb-1 mt-4 ml-4">
                                                @if(old('ishalal'))
                                                    <input type="checkbox" name="ishalal" class="custom-control-input" id="halal" value="1" checked/>   
                                                @else
                                                    <input type="checkbox" name="ishalal" class="custom-control-input" id="halal" value="1"/>   
                                                @endif
                                                <label class="custom-control-label" for="halal">Halal Food</label> 

                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="description">Description</label>
                                            <textarea class="form-control {{($errors->has('description') ? 'input-error' : '')}}" name="description" id="description" rows="5" placeholder="Tell us more about this dish">@if(old('description')) {{old('description')}} @endif
                                            </textarea> 
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