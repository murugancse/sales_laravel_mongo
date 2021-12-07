@extends('layouts.admin')
@section('headSection')

@endsection

@section('main-content')
<div class="container-fluid main-container">
    
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Dashboard
                @include('includes.messages')
            </div>
            <div class="panel-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>
    </div>
    
</div>
@endsection
    
@section('footerSection')

<script>
  $("#dashboard_sidebar_a_id").addClass('active');
  $(document).ready(function () {
	  alert(2);
        $.getJSON("https://api.ipify.org?format=json", function (data) {
           alert(data.ip);
        })
    });
</script>
@endsection
