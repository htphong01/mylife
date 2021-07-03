<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed !important;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('AdminTemplate/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Quản trị viên</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/logo1.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">MyLife</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ URL::to('/admin/dashboard') }}" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/dashboard') ? 'active': ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tổng quan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ URL::to('/admin/users') }}" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/users') ? 'active': ''; ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Người dùng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ URL::to('/admin/posts') }}" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/posts') ? 'active': ''; ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Bài viết
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ URL::to('/admin/comments') }}" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/comments') ? 'active': ''; ?>">
              <i class="nav-icon fas fa-comment-dots"></i>
              <p>
                Bình luận
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ URL::to('/admin/events') }}" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/events') ? 'active': ''; ?>">
				    <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Sự kiện
            </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ URL::to('/admin/reports') }}" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/reports') ? 'active': ''; ?>">
				    <i class="nav-icon fas fa-copy"></i>
            <p>
              Báo cáo
            </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ URL::to('/admin/helps') }}" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/helps') ? 'active': ''; ?>">
			      	<i class="nav-icon fas fa-question-circle"></i>
              <p>
                Hỗ trợ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ URL::to('/admin/logout') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Đăng xuất
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>