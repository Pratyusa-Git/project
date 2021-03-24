<!DOCTYPE html>
<html>
<body>

<h2>Category</h2>
@foreach($parent_categories as $key => $parent_category)
  {{$parent_category->category}} <a href="{{route('add_product',['category'=>base64_encode($parent_category->id)])}}">Add Product</a><br>
  @if(count($parent_category->subcategory))
    @include('category.subcategories',['subcategories'=>$parent_category->subcategory])
  @endif
@endforeach
<h3><a href="{{route('logout')}}">Logout</a>  <a href="{{route('home')}}">Dashboard</a></h3><br>
</body>
</html>