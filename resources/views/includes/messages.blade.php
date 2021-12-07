@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
  <div class="alert alert-danger alert-dismissible">
  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  	<strong>Error!</strong> {{ __('Error') }} : {{ __($error) }}
  </div>
	
  @endforeach
@endif
@if (session()->has('error'))
  <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Danger!</strong> {{ __('Error') }} : {{__(session('error')) }}
    </div>
@endif
@if (session()->has('success'))
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<strong>Success!</strong> {{ __('Success') }} : {{__(session('success')) }}
  	</div>
@endif

@if (session()->has('message'))
	<div class="alert alert-info alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<strong>Success!</strong> {{ __('Success') }} : {{__(session('message')) }}
  	</div>
	
@endif
