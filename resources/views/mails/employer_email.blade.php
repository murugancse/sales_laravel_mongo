<!DOCTYPE html>
<html>
<head>
    <title>Sales product Mail</title>
</head>
<body>
	<h1>@if($details['status']==1) Added New @else Updated @endif Sales Product</h1>

	<h2>Sales Product Details</h2>
<p>

	@php
		//dd($details);
		$salesproduct = $details['product'];
	@endphp
	Product Name: {{$salesproduct->product->name}} <br>
	Categoty Name: {{$salesproduct->product->category->name}} <br>
	Qty:{{$salesproduct->quantity}} <br>
	Price:{{$salesproduct->price}} <br>
	Total Amount: {{$salesproduct->total_amount}} <br>
</p>
</body>
</html>