<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Products</h2>

<table>
  <tr>
    <th>Product</th>
    <th>Category</th>
    <th>Price</th>
    <th>Description</th>
  </tr>
  @foreach($products as $row => $product)
  <tr>
    <td>{{$product->product_name}}</td>
    <td>{{$product->category->category}}</td>
    <td>{{$product->price}}</td>
    <td>{{$product->description}}</td>
  </tr>
  @endforeach
</table>
<h3><a href="{{route('logout')}}">Logout</a>  <a href="{{route('home')}}">Dashboard</a></h3><br>
</body>
</html>