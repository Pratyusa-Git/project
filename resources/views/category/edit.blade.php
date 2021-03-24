<!DOCTYPE html>
<html>
<body>

<h2>Add Category</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('editCategory')}}" method="post">
	@csrf
  <label for="category">Category Name:</label><br>
  <input type="text" id="category" name="category" value="{{$categories['category']}}"><br>
  <br>
  <input type="hidden" name="category_id" value="{{$categories['id']}}">
  <input type="submit" value="Submit">
</form> 
<h3><a href="{{route('logout')}}">Logout</a>  <a href="{{route('home')}}">Dashboard</a></h3><br>
</body>
</html>