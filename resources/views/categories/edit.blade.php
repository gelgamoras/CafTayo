<h2>Edit Campus</h2>

<form action="{{ route('categories.update', $categories->id) }}" method="POST">
    @csrf
    @method("PUT")

    Name : <input type="text" name="name" value="{{ $categories->name }}"/> @error('name') {{$message}} @enderror <br>
    
    Campus : 
    <select name="campus">
    @foreach ($campus as $item)
        <option value="{{$item->id}}"> {{$item->name}} </option> 
    @endforeach 
    @error('name') {{$message}} @enderror <br>
    <input type="submit" value="submit"/>
</form>