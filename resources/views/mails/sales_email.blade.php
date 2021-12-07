<!DOCTYPE html>
<html>
<head>
    <title>Sales product Mail</title>
    <style type="text/css">
    	table, td, th {
		  border: 1px solid black;
		}

		table {
		  width: 100%;
		  border-collapse: collapse;
		}
    </style>
</head>
<body>
	<h1>Sales Products List</h1>
<p>

	@php
		//dd($details);
		$salesproducts = $details['salesproduct'];
	@endphp
	<table id="example1" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
            
            <th>Name</th>
            <th>Category</th>
            <th>Code</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Amount</th>
            <th>Status</th>
           
        </tr>
        </thead>
        
        <tbody>
        @foreach($salesproducts as $key => $sales)
            <tr>
                
                <td>{{ $sales->product->name }}</td>
                <td>{{ $sales->product->category->name }}</td>
                <td>{{ $sales->code }}</td>
                <td>{{ $sales->quantity }}</td>
                <td>{{ number_format($sales->price, 2) }}</td>
                <td>{{ number_format($sales->total_amount, 2) }}</td>
                <td>{{ $sales->status==1 ? 'Active' : 'Inactive' }}</td>
               
            </tr>
        @endforeach
        </tbody>

    </table>
</p>
</body>
</html>