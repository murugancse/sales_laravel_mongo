<div class="col-md-2 sidebar">
    <div class="row">
        <!-- uncomment code for absolute positioning tweek see top comment in css -->
        <div class="absolute-wrapper"> </div>
        <!-- Menu -->
        <div class="side-menu">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Main Menu -->
                <div class="side-menu-container">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ route('admin.home') }}"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                        <li><a href="{{ route('admin.category.index') }}"><span class="glyphicon glyphicon-plane"></span> Category</a></li>
                        <li><a href="{{ route('admin.product.index') }}"><span class="glyphicon glyphicon-cloud"></span> Product</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
      </div>
  </div>