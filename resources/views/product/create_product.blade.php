<!DOCTYPE html>
<html>
<body>

<h2>Add Product</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('addProduct')}}" method="post">
	@csrf
  <label for="product">Product Name:</label><br>
  <input type="text" id="product" name="product"><br>
  <label for="price">Product Price:</label><br>
  <input type="number" id="price" name="price" min="0"><br>
  <label for="description">Product Description:</label><br>
  <textarea name="description"></textarea><br>
  <input type="hidden" name="category_id" value="{{$category_id}}">
  <input type="submit" value="Submit">
</form> 
<h3><a href="{{route('logout')}}">Logout</a>  <a href="{{route('home')}}">Dashboard</a></h3><br>
</body>
</html>