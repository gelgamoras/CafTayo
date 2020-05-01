<h2>Add Food</h2>

<form method="POST" action="{{ route('subscribers.store') }}" >
@csrf 

Email : <input type="email" name="email" id="email"/> @error('email') {{$message}} @enderror <br>

<input type="submit" value="submit">

</form>

