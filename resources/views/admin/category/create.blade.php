@extends('layouts.admin')
@section('headSection')

@endsection

@section('main-content')
<div class="container-fluid main-container">
    
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
               Add Category
               @include('includes.messages')
            </div>
            <div class="panel-body">
                <form role="form" action="{{ route('admin.category.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" name="name" value="" placeholder="Enter Category Name">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-md-right">Add Category</button>
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

