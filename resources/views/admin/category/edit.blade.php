@extends('layouts.admin')
@section('headSection')

@endsection

@section('main-content')
<div class="container-fluid main-container">
    
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
               Edit Category
               @include('includes.messages')
            </div>
            <div class="panel-body">
                <form role="form" action="{{ route('admin.category.update', $category->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Enter Category Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select id="status" name="status" class="form-control">
                                       <option @if($category->status==1) selected @endif value="1">Active</option>
                                       <option @if($category->status==0) selected @endif value="0">InActive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-md-right">Update Category</button>
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

