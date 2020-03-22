@extends('layouts.concessionaire.main')

@section('page_header')
    Food Page
@endsection

@section('subheader')
    Overview
@endsection

@section('page_top_buttons')
    <button type="button" class="btn mt-1 btn-sm btn-outline-success mr-1" data-toggle="modal" data-target="#add-to-menu" onclick="window.location.href='{{route('food_create')}}'">
        + New Food
    </button> 
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-small mb-4 pt-3">
                <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                        <img src="{{ asset('images/food')}}/{{ $food['image'] }}" width="80%" height="100%" /> 
                    </div> 
                    <h4 class="mb-0">{{ $food['name'] }}</h4> 
                    <span class="text-muted d-block mb-2">{{ $food['category'] }}</span> 
                    <span style="font-weight: 300;">{{ $food['shortdesc'] }}</span>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                        <strong class="text-muted d-block mb-2">Description</strong> 
                        <span>{{ $food['desc'] }} </span> 
                    </li> 
                    <li class="list-group-item p-4">
                        <strong class="text-muted d-block mb-2">Ingredients</strong> 
                        <ul style="column-count: 2;">
                            @foreach($ingredients as $i)
                                <li>{{ $i }}</li>
                            @endforeach
                        </ul>
                    </li> 
                </ul>
            </div> 
        </div>
        <div class="col-lg-8">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h5 class="m-0">Food Details</h5> 
                </div> 
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col">
                                <form action="#" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="foodName">Food name</label> 
                                            <input type="text" name="foodname" class="form-control" id="foodName" 
                                                placeholder="What is it called?" value="{{ $food['name'] }}" /> 
                                        </div> 
                                    </div> 
                                    <div class="form-row">
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="shortdesc">Short Description</label> 
                                            <input type="text" name="shortdesc" class="form-control" id="shortdesc"
                                                placeholder="Say a few words about this dish" value="{{ $food['shortdesc'] }}" /> 
                                        </div> 
                                        <div class="form-group col-md-3">
                                            <label for="category">Category</label> 
                                            <select id="category" name="category" class="form-control" id="category">
                                                <option selected>{{ $food['category'] }}</option> 
                                                <option>Ulam</option> 
                                                <option>Quick Bites</option> 
                                                <option>Sweet Delights</option> 
                                                <option>Meryenda</option> 
                                                <option>Drinks</option> 
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="subcategory">Subcategory</label> 
                                            <input type="text" name="subcategory" class="form-control" id="subcategory"
                                                placeholder="Subcategory" value="{{ $food['subcategory'] }}" /> 
                                        </div> 
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="ingredients">Ingredients</label>
                                            <textarea class="form-control" name="ingredients" id="ingredients" rows="3" placeholder="What are in this dish?">{{ $food['ingredients'] }}
                                            </textarea> 
                                            <div class="input-note">Separate by comma (ex. Potato, Chicken, Spinach...)</div> 
                                        </div> 
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="calories">Calories</label> 
                                            <div class="input-group">
                                                <input type="text" name="calories" class="form-control" id="calories"
                                                placeholder="Calories" value="{{ $food['calories'] }}" /> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text">cal</span>
                                                </div> 
                                            </div> 
                                        </div> 
                                        <div class="form-group col-md-3">
                                            <label for="price">Price</label> 
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">₱</span> 
                                                </div> 
                                                <input type="number" name="price" class="form-control" id="price"
                                                    placeholder="How much is it?" step=0.01 value="{{ $food['price'] }}" /> 
                                            </div> 
                                        </div> 
                                        <div class="form-group col-md-2">
                                            <div class="custom-control custom-checbox mb-1 mt-4 ml-4">
                                                @if ($food['halal'] == 0)
                                                    <input type="checkbox" class="custom-control-input" id="halal" /> 
                                                @else 
                                                    <input type="checkbox" class="custom-control-input" id="halal" checked/> 
                                                @endif
                                                
                                                <label class="custom-control-label" for="halal">Halal Food</label> 
                                            </div>
                                        </div> 
                                        <div class="form-group col-md-4">
                                            <h6 class="mb-2">Image</h6> 
                                            <fieldset> 
                                                <div class="custom-file w-100">
                                                    <input type="file" class="custom-file-input" id="image" /> 
                                                    <label class="custom-file-label" for="image">Choose image</label> 
                                                </div> 
                                            </fieldset>
                                        </div>
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Tell us more about this dish">{{ $food['desc'] }}
                                            </textarea> 
                                        </div> 
                                    </div> 
                                    <button type="submit" class="btn btn-primary">Update Food</button> 
                                </form> 
                            </div> 
                        </div> 
                    </li> 
                </ul> 
            </div>
        </div>  
    </div> 
@endsection