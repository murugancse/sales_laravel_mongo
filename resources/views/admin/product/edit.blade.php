@extends('layouts.admin')
@section('headSection')

@endsection

@section('main-content')
<div class="container-fluid main-container">
    
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
               Edit Product
               @include('includes.messages')
            </div>
            <div class="panel-body">
                <form role="form" action="{{ route('admin.product.update', $product->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="Enter Product Name">
                                </div>
                                <div class="form-group">
                                    <label>Product Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="" disabled selected>Select a Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $product->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Product Code</label>
                                    <input type="text" class="form-control" name="code" value="{{ $product->code }}" placeholder="Enter Product Code">
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}">
                                </div>
                                <div class="form-group">
                                    <label>Buying Price</label>
                                    <input type="text" class="form-control" name="buying_price" value="{{ $product->buying_price }}" placeholder="Enter Buying Price">
                                </div>
                                <div class="form-group">
                                    <label>Selling Price</label>
                                    <input type="text" class="form-control" name="selling_price" value="{{ $product->selling_price }}" placeholder="Enter Selling Price">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-md-right">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>
@endsection
    
@section('footerSection')

<script>
  $("#dashboard_sidebar_a_id").addClass('active');
</script>
@endsection

