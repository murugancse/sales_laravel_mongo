@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __(' Edit Sales Product') }}
                    @php
                        //dd($sales);
                    @endphp
                    @include('includes.messages')
                </div>

                <div class="card-body">
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
                                            <option @if($sales->product->category_id==$category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product</label>
                                    <select id="product_id" name="product_id" required="" class="form-control">
                                        <option value="" disabled selected>Select a Product</option>
                                        @foreach($products as $product)
                                            <option @if($sales->product_id==$product->id) selected @endif value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
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
</div>
<script type="text/javascript">
    function getProductsList(catid){
         $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: "{{csrf_token()}}",
                    },
                    url: "{{ URL::to('/get-categoryproducts') }}?cat_id=" + catid,
                    success: function(res) {
                    if (res.status==1) {
                        $("#product_id").empty();
                        $("#product_id").append($('<option></option>').attr('value', '').text("Select"));
                        $.each(res.products,function(key,entry){
                            $("#product_id").append($('<option></option>').attr('value', entry.id).text(entry.name));
                           // var select = $("#state");
                           // select.material_select('destroy');
                            //select.empty();
                            
                        });
                    } else {
                        alert("No Data found");
                    }
                }
            });
    }
    function CalculateTotal(){

        var quantity = $("#quantity").val()=='' ? 0 : $("#quantity").val();
        var price = $("#price").val()=='' ? 0 : $("#price").val();
        totalprice = (quantity*price).toFixed(2);
        //alert(totalprice);
        $("#totalprice").val(totalprice)
    }
    $(document).on('input', '.allow_decimal', function(){
       var self = $(this);
       self.val(self.val().replace(/[^0-9\.]/g, ''));
       if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
       {
         evt.preventDefault();
       }
     });

</script>
@endsection
