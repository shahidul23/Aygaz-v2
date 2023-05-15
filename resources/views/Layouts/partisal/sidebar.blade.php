<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{url('/')}}" class="brand-link">
    <img src="{{ asset('public/image/aygaz.jpeg') }}" alt="AYGAZ" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight center"><b>AYGAZ</b></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
          <!-- <img src="{{ asset('public/image/aygaz.jpeg') }}" class="img-circle elevation-2" alt="User Image"> -->
        </div>
			<div class="info">
				<a href="#" class="d-block">&nbsp&nbsp&nbsp{{$data->name}}</a>
			</div>
		</div>
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          	with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('outbound')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Outbound</p>
                </a>
              </li>
            </ul>
          </li>
          	<li class="nav-item">
          		<a href="#" class="nav-link">
          			<i class="nav-icon fas fa-table"></i>
          			<p>
          				Tables
          				<i class="fas fa-angle-left right"></i>
          			</p>
          		</a>
          		<ul class="nav nav-treeview">
          			<li class="nav-item">
          				<a href="{{route('client.list')}}" class="nav-link">
          					<i class="far fa-circle nav-icon"></i>
          					<p>Client list</p>
          				</a>
          			</li>
          		</ul>
          	</li><hr>
            @if($data->is_admin == 1)
            <li class="nav-item">
              <a href="{{route('registration')}}" class="nav-link">
                <i class="fas fa-users"></i>
                <p>
                  Add New Member
                </p>
              </a>
            </li>
            @endif
            @if($data->is_admin == 1)
            <li class="nav-item">
              <a href="{{route('user-list')}}" class="nav-link">
                <i class="fas fa-users"></i>
                <p>
                  Member List
                </p>
              </a>
            </li>
            @endif
          	<li class="nav-item">
          		<a href="{{route('user-logout')}}" class="nav-link">
          			<i class="far fa-circle nav-icon"></i>
          			<p>
          				Log Out
          			</p>
          		</a>
          	</li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>