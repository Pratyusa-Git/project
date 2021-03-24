@foreach($subcategories as $k => $subcategorry)
<ul>
	<li>
		{{$subcategorry->category}} <a href="{{route('add_product',['category'=>base64_encode($subcategorry->id)])}}">Add Product</a>
	</li>
		@if(count($subcategorry->subcategory))
			@include('category.subcategories',['subcategories'=>$subcategorry->subcategory])
		@endif
</ul>

@endforeach