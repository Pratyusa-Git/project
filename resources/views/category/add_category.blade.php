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

<form action="{{route('addCategory')}}" method="post">
	@csrf
  <label for="category">Category Name:</label><br>
  <input type="text" id="category" name="category"><br>
  <label for="parent">Choose Parent Category:</label>
  <select name="parent" id="parent">
  	<option value="0">No Category</option>
  @foreach($categories as $key=>$category)
  	<option value="{{$category['id']}}">{{$category['category']}}</option>
  @endforeach
  </select><br>
  <input type="submit" value="Submit">
</form> 
<h3><a href="{{route('logout')}}">Logout</a>  <a href="{{route('home')}}">Dashboard</a></h3><br>
</body>
</html>