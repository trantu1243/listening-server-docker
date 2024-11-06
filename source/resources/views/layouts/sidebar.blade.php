<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Police Page</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/police.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="/" class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                    <i class="nav-icon fa fa-eye"></i>
                    <p>Danh sách đối tượng</p>
                </a>
            </li>

            @if (auth()->user()->role === 0)
            <li class="nav-item {{ Route::currentRouteName() == 'show-user' || Route::currentRouteName() == 'add-user' ? 'menu-open' : '' }}">
                <a href="" class="nav-link {{ Route::currentRouteName() == 'show-user' || Route::currentRouteName() == 'add-user' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Quản lý công an
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/police" class="nav-link {{ Route::currentRouteName() == 'show-user' ? 'active' : '' }}">
                        <i class="fa fa-genderless nav-icon"></i>
                        <p>Danh sách công an</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/add-police" class="nav-link {{ Route::currentRouteName() == 'add-user' ? 'active' : '' }}">
                        <i class="fa fa-genderless nav-icon"></i>
                        <p>Thêm công an</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if (auth()->user()->role === 1)
            <li class="nav-item">
                <a href="/squad" class="nav-link {{ Route::currentRouteName() == 'show-squad' ? 'active' : '' }}">
                    <i class="nav-icon fa fa-users"></i>
                    <p>Quản lý đội</p>
                </a>
            </li>
            @endif

            @if (auth()->user()->role === 0)
            <li class="nav-item {{ Route::currentRouteName() == 'show-squad' || Route::currentRouteName() == 'add-squad' ? 'menu-open' : '' }}">
                <a href="" class="nav-link {{ Route::currentRouteName() == 'show-squad' || Route::currentRouteName() == 'add-squad' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Quản lý đội
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/squad" class="nav-link {{ Route::currentRouteName() == 'show-squad' ? 'active' : '' }}">
                        <i class="fa fa-genderless nav-icon"></i>
                        <p>Danh sách đội</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/add-squad" class="nav-link {{ Route::currentRouteName() == 'add-squad' ? 'active' : '' }}">
                        <i class="fa fa-genderless nav-icon"></i>
                        <p>Thêm đội</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif


            <li class="nav-header">ACTIONS</li>
            <li class="nav-item">
                <a href="/logout" class="nav-link">
                    <i class="nav-icon fa fa-sign-out"></i>
                    <p>Đăng xuất</p>
                </a>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
