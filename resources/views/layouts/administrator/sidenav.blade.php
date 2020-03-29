<!-- 
I'mma keep layouts for admin and concessionaire separate muna habang wala pang log in/users, 
saka ko na ipagsama if meron na. Sorry still learning ✌️
-->
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
  <div class="main-navbar">
    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
      <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
        <div class="d-table m-auto">
          <img id="main-logo" class="d-inline-block align-top mr-1" style="max-height: 25px;" src="{{ asset('images/icon-logo-leaf.png') }}" alt="Shards Dashboard">
          <span class="d-none d-md-inline ml-1">CafTayo Dashboard</span>
        </div>
      </a>
      <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
        <i class="material-icons">&#xE5C4;</i>
      </a>
    </nav>
  </div>
  <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
    <div class="input-group input-group-seamless ml-3">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-search"></i>
        </div>
      </div>
      <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
  </form>
  <div class="nav-wrapper">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Route::is('admin_homepage') ? 'active' : '' }}" href="{{ route('admin_homepage') }}">
        <i class="material-icons">home</i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('users_list') ? 'active' : '' }} 
                           {{ Route::is('users_create') ? 'active' : '' }} 
                           {{ Route::is('users_detail') ? 'active' : '' }}" 
                           href="{{ route('users_list') }}">
        <i class="material-icons">account_circle</i>
          <span>Manage Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('campus_list') ? 'active' : '' }}
                           {{ Route::is('campus_create') ? 'active' : '' }} " href="{{ route('campus_list') }}">
        <i class="material-icons">
          school
        </i>
          <span>Campuses</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('menulogs_list') ? 'active' : '' }}" href="{{ route('menulogs_list') }}">
          <i class="material-icons">assignment</i>
          <span>Menu Logs</span>
        </a>
      </li>
    </ul>
  </div>
</aside>