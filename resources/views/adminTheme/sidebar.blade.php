<div class="scrollbar-inner">
  <!-- Brand -->
  <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ getGlobalFilePath('/upload/setting/',getSettingValue('logo')) }}" class="navbar-brand-img" alt="...">
        </a>
        <div class=" ml-auto ">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block active" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
  <div class="navbar-inner">
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
      <!-- Nav items -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <i class="ni ni-tv-2 text-primary"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
         <li class="nav-item">
          <a href="{{ route('user.index') }}" class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}">
            <i class="fas fa-users text-primary"></i>
            <span class="nav-link-text">User</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin-user.index') }}" class="nav-link {{ Request::is('admin/admin-user*') ? 'active' : '' }}">
            <i class="fas fa-user text-primary"></i>
            <span class="nav-link-text">Admin</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>