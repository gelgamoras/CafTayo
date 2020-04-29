<h2>Add Food</h2>

<form method="POST" action="{{ route('food.store') }}" enctype="multipart/form-data">
@csrf 

Name : <input type="text" name="name" id="name"/> @error('name') {{$message}} @enderror <br>
Category : 
<select name="categories">
    @foreach ($categories as $item)
    <option value="{{$item->id}}"> {{$item->name}} </option>
    @endforeach
</select><br>

Short Description : <input type="text" name="shortDescription" id="shortDescription"/> @error('shortDescription') {{$message}} @enderror <br>
Description : <input type="text" name="description" id="description"/> @error('description') {{$message}} @enderror <br>
Ingredients : <input type="text" name="ingredients" id="ingredients"/> @error('ingredients') {{$message}} @enderror <br>
Calories : <input type="number" name="calories" id="calories"/> @error('calories') {{$message}} @enderror <br>
Price : <input type="number" name="price" id="price"/> @error('price') {{$message}} @enderror <br>

Campus : 
<select name="campus">
    @foreach ($campus as $item)
    <option value="{{$item->id}}"> {{$item->name}} </option>
    @endforeach
</select><br>

Halal Food : <input type="checkbox" name="ishalal" id="halal" value="1"/><br>
Featured? : <input type="checkbox" name="isfeatured" id="isfeatured" value="1"/><br>
Image: <input type="file" name="coverphoto" id="image"/><br>

<input type="submit" value="submit">

</form>

