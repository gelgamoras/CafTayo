<h2>Add Food</h2>

<form method="POST" action="{{ route('food.store', request()->route('campus')) }}" enctype="multipart/form-data">
    @csrf 

    <div class="form-row">
        <div class="form-group col">
            <label for="name">{{ __('Food Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name of Food" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label for="category">{{ __('Category') }}</label>

            <select id="category" name="category" class="form-control @error('category') is-invalid @enderror" required>
                <option value="" selected>Select a Category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}"> {{$category->name}} </option>
                @endforeach
            </select>
        
            @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label for="shortDescription">{{ __('Short Description') }}</label>
            <input id="shortDescription" type="text" class="form-control @error('shortDescription') is-invalid @enderror" placeholder="Short Description" name="shortDescription" value="{{ old('shortDescription') }}" required autocomplete="shortDescription">

            @error('shortDescription')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label for="description">{{ __('Description') }}</label>
            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Description" name="description" value="{{ old('description') }}" required autocomplete="description">

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label for="ingredients">{{ __('Ingredients') }}</label>
            <input id="ingredients" type="text" class="form-control @error('ingredients') is-invalid @enderror" placeholder="Ingredients" name="ingredients" value="{{ old('ingredients') }}" required autocomplete="ingredients">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label for="calories">{{ __('Calories') }}</label>
            <input id="calories" type="text" class="form-control @error('calories') is-invalid @enderror" placeholder="Calories" name="calories" value="{{ old('calories') }}" required autocomplete="calories">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label for="price">{{ __('Price') }}</label>
            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Price" name="name" value="{{ old('price') }}" required autocomplete="price">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label for="halal">{{ __('Halal?') }}</label>
            <input type="radio" id="halal" name="ishalal" value="Halal" class="form-control @error('halal') is-invalid @enderror" @if(old('halal') == 'Halal') selected @endif>
            <label for="halal">Yes</label>
            <input type="radio" id="haram" name="ishalal" value="Haram" class="form-control @error('halal') is-invalid @enderror" @if(old('halal') == 'Haram') selected @endif>
            <label for="haram">No</label> 

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="coverphoto" class="form-label">{{ __('Cover Photo') }}</label><br>
            <input id="coverphoto" class="form-control" type="file" class="@error('coverphoto') is-invalid @enderror" name="coverphoto">
            @error('coverphoto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="col form-group">
            <button type="submit" class="btn btn-sm btn-primary mt-3">Add Food</button> 
        </div>
    </div>
</form>