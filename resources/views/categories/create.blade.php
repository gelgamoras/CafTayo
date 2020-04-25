<h2>Add Category</h2>

<form method="POST" action="{{ route('categories.store') }}" >
@csrf 

Name : <input type="text" name="name" id="name"/> @error('name') {{$message}} @enderror <br>
Campus : 
<select name="campus">
    @foreach ($campus as $item)
    <option value="{{$item->id}}"> {{$item->name}} </option>
    @endforeach
</select><br>
<input type="submit" value="submit">

</form>

