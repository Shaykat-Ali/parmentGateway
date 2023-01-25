 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/home') }}" class="brand-link">
      <img src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview {{ menu_open_if_match('home') }}">
            <a href="{{ url('/home') }}" class="nav-link {{active_if_match('home') }}">
              <i class="fa fa-home"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ menu_open_if_match('partners') }}">
            <a href="#" class="nav-link ">
              <i class="fa fa-user"></i>
              <p>
                Partner
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('partners.index') }}" class="nav-link {{active_if_match('partners') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Partner Management</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ menu_open_if_match('affiliates') }}">
            <a href="#" class="nav-link ">
              <i class="fa fa-user"></i>
              <p>
                Affiliate
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('affiliates.index') }}" class="nav-link {{active_if_match('affiliates') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Affiliate Management</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ menu_open_if_match('users') }}">
            <a href="#" class="nav-link ">
              <i class="fa fa-cogs"></i>
              <p>
                Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link {{ active_if_match('users') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
