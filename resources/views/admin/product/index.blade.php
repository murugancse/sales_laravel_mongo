@extends('layouts.admin')
@section('headSection')

@endsection

@section('main-content')
<div class="container-fluid main-container">
    
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Products
                <a href="{{ route('admin.product.create') }}" class="btn
									btn-info btn-sm pull-right">
                                    Add Product
                                </a>
                                <br>
                @include('includes.messages')
            </div>
            <div class="panel-body">
                  <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        
                        <th>Name</th>
                        <th>Category</th>
                        <th>Code</th>
                        <th>Buying Price</th>
                        <th>Selling Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($products as $key => $product)
                        <tr>
                            
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ number_format($product->buying_price, 2) }}</td>
                            <td>{{ number_format($product->selling_price, 2) }}</td>
                            <td>{{ $product->status==1 ? 'Active' : 'Inactive' }}</td>
                            <td id="tdref_{{ $product->id }}">
                                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn
									btn-info">
                                    Edit
                                </a>
                                <button class="btn btn-danger" type="button" onclick="deleteItem({{ $product->id }})">
                                    Delete
                                </button>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    
</div>
@endsection
    
@section('footerSection')

<script>
	function deleteItem(id) {
		if (confirm('Are you sure you want to delete?')) {
            event.preventDefault();
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ URL::to('/admin/delete-product') }}?product_id=" + id,
                    success: function(res) {
                    if (res) {
                        var parrent = $("#tdref_"+id).parents("tr");
                        parrent.remove(); 
                        alert("successfully deleted");
                    } else {
                        alert("Failed to delete");
                    }
                }
            });
            
        }else{
        	 event.preventDefault();
        	 return false;
        }
	}
  $("#dashboard_sidebar_a_id").addClass('active');
</script>
@endsection

