@extends('layouts.admin')
@section('headSection')

@endsection

@section('main-content')
<div class="container-fluid main-container">
    
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
               Edit Sales Product
               @php
                //dd($sales);
               @endphp
               @include('includes.messages')
            </div>
            <div class="panel-body">
                <form role="form" action="{{ route('salesproduct.update', $sales->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" required="" onclick="getProductsList(this.value);" class="form-control">
                                        <option value="" disabled selected>Select a Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product</label>
                                    <select id="product_id" name="product_id" required="" class="form-control">
                                        <option value="" disabled selected>Select a Product</option>
                                       
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>quantity</label>
                                    <input type="text" class="form-control" onkeyup="CalculateTotal();" id="quantity" name="quantity" class="allow_decimal" value="{{ $sales->quantity }}" placeholder="Enter quantity">
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" onkeyup="CalculateTotal();" class="form-control allow_decimal" id="price" name="price" value="{{ $sales->price}}" placeholder="Enter Price">
                                </div>
                                <div class="form-group">
                                    <label>Total Amount</label>
                                    <input type="text" class="form-control" id="totalprice" name="total_amount" readonly="" value="{{ $sales->total_amount }}" placeholder="Enter Price">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-md-right">Update Sales Product</button>
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

