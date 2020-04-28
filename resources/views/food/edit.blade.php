<h2>Edit Food</h2>

<form action="{{ route('food.update', $food->id) }}" method="POST">
    @csrf
    @method("PUT")

    Name : <input type="text" name="name" value="{{ $food->name }}"/> @error('name') {{$message}} @enderror <br>
    
    Category : 
    <select name="categories">
        @foreach ($categories as $item)
        <option value="{{$item->id}}"> {{$item->name}} </option>
        @endforeach
    </select><br>

    Short Description : <input type="text" name="shortDescription" value="{{ $food->shortDescription }}"/> @error('shortDescription') {{$message}} @enderror <br>
    Description : <input type="text" name="description" value="{{ $food->description }}"/> @error('description') {{$message}} @enderror <br>
    Ingredients : <input type="text" name="ingredients" value="{{ $food->ingredients }}"/> @error('ingredients') {{$message}} @enderror <br>
    Calories : <input type="number" name="calories" value="{{ $food->calories }}"/> @error('calories') {{$message}} @enderror <br>
    Price : <input type="number" name="price" value="{{ $food->price }}"/> @error('price') {{$message}} @enderror <br>

    Campus : 
    <select name="campus">
        @foreach ($campus as $item)
        <option value="{{$item->id}}"> {{$item->name}} </option>
        @endforeach
    </select><br>

    Halal Food : <input type="checkbox" name="ishalal" value="{{ $food->isHalal }}" /><br>
    Featured? : <input type="checkbox" name="isfeatured" value="{{ $food->isFeatured }}" /><br>
    <!--Image: <input type="file" name="coverphoto" value="{{ $food->coverphoto }}"/><br> -->

<input type="submit" value="submit">
</form>