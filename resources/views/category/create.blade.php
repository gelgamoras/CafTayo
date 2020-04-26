<form method="POST" action="{{ route('categories.store', request()->route('campus')) }}">
    @csrf
    <div class="form-row">
        <div class="form-group w-100 px-1">
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
        <div class="form-group w-100 px-1">
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
    <div class="form-row px-1">
        <button type="submit" class="btn btn-sm btn-primary mt-3">Add Category</button> 
    </div> 
</form> 