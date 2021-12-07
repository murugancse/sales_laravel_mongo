@extends('layouts.admin')
@section('headSection')

@endsection

@section('main-content')
<div class="container-fluid main-container">
    
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Category
                <a href="{{ route('admin.category.create') }}" class="btn
									btn-info btn-sm pull-right">
                                    Add Category
                                </a>
                                <br>
                @include('includes.messages')
            </div>
            <div class="panel-body">
                  <table id="example1" class="table table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($categories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->status==1 ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('admin.category.edit', $category->id) }}" class="btn
									btn-info">
                                    Edit
                                </a>
                                <button class="btn btn-danger" type="button" onclick="deleteItem({{ $category->id }})">
                                    Delete
                                </button>
                                <form id="delete-form-{{ $category->id }}" action="{{ route('admin.category.destroy', $category->id) }}" method="post"
                                      style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
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
            document.getElementById('delete-form-'+id).submit();
        }else{
        	 event.preventDefault();
        	 return false;
        }
	}
  $("#dashboard_sidebar_a_id").addClass('active');
</script>
@endsection

