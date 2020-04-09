<h2>Edit Campus</h2>

<form action="{{ route('campus.update', $campus->id) }}" method="POST">
    @csrf
    @method("PUT")

    Name : <input type="text" name="name" value="{{ $campus->name }}"/> @error('name') {{$message}} @enderror <br>
    Address : <input type="text" name="address" value="{{ $campus->address }}"/> @error('address') {{$message}} @enderror <br>
    <input type="submit" value="submit"/>
</form>