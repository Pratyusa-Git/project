@foreach($subcategories as $k => $subcategorry)
<ul>
	<li>
		{{$subcategorry->category}} <a href="{{route('add_product',['category'=>base64_encode($subcategorry->id)])}}">Add Product</a>  <a href="{{route('edit_category',['category'=>base64_encode($subcategorry->id)])}}">Edit</a>  <a href="{{route('deleteCategory',['category'=>base64_encode($subcategorry->id)])}}">Delete</a>
	</li>
		@if(count($subcategorry->subcategory))
			@include('category.subcategories',['subcategories'=>$subcategorry->subcategory])
		@endif
</ul>

@endforeach