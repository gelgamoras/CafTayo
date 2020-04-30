<h2>Edit Food</h2>

<form method="POST" action="{{ route('food.update', ['campus' => request()->route('campus'), 'food' => $food->id]) }}" enctype="multipart/form-data">
    @csrf 
    @method('PUT')

    <div class="form-row">
        <div class="form-group col">
            <label for="name">{{ __('Food Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name of Food" name="name" value="{{ $food->name }}" required autocomplete="name" autofocus>

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
                    @if($category->id == $food->category_id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @endif
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
            <input id="shortDescription" type="text" class="form-control @error('shortDescription') is-invalid @enderror" placeholder="Short Description" name="shortDescription" value="{{ $food->shortdescription }}" required autocomplete="shortDescription">

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
            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Description" name="description" value="{{ $food->description }}" required autocomplete="description">

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
            <input id="ingredients" type="text" class="form-control @error('ingredients') is-invalid @enderror" placeholder="Ingredients" name="ingredients" value="{{ $food->ingredients }}" required autocomplete="ingredients">

            @error('ingredients')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label for="calories">{{ __('Calories') }}</label>
            <input id="calories" type="text" class="form-control @error('calories') is-invalid @enderror" placeholder="Calories" name="calories" value="{{ $food->calories }}" required autocomplete="calories">

            @error('calories')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label for="price">{{ __('Price') }}</label>
            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Price" name="price" value="{{ $food->price }}" required autocomplete="price">

            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col">
            <label for="halal">{{ __('Halal?') }}</label>
            <input type="checkbox" id="halal" name="ishalal" value="Halal" class="form-control @error('halal') is-invalid @enderror" {{ $food->isHalal == 'Halal' ? 'checked' : '' }}>

            @error('ishalal')
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
            <button type="submit" class="btn btn-sm btn-primary mt-3">Update Food</button> 
        </div>
    </div>
</form>