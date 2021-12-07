@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Sales Product') }}
                    <a href="{{ route('salesproduct.create') }}" class="btn
                                    btn-info btn-sm pull-right">
                                    Add Sales Product
                                </a>
                    @include('includes.messages')
                </div>

                <div class="card-body">
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
                        <th>Actions</th>
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
                            <td >
                                <a href="{{ route('salesproduct.edit', $sales->id) }}" class="btn
                                    btn-info">
                                    Edit
                                </a>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
