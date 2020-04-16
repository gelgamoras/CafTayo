<h2>Add Campus</h2>

<form method="POST" action="{{ route('campus.store') }}" >
@csrf 

Name : <input type="text" name="name" id="name"/> @error('name') {{$message}} @enderror <br>
Address : <input type="text" name="address" id="address"/> @error('name') {{$message}} @enderror <br>
<input type="submit" value="submit">

</form>