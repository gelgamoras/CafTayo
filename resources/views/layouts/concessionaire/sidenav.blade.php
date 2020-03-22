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
        <a class="nav-link {{ Route::is('con_homepage') ? 'active' : '' }}" href="{{ route('con_homepage') }}">
        <i class="material-icons">menu_book</i>
          <span>Menu of the Day</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('menu_create') ? 'active' : '' }}" href="{{ route('menu_create') }}">
        <i class="material-icons">
          calendar_today
        </i>
          <span>Plan a Menu</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('menu_list') ? 'active' : '' }}" href="{{ route('menu_list') }}">
          <i class="material-icons">table_chart</i>
          <span>Manage Menus</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('food_list') ? 'active' : '' }}" href="{{ route('food_list') }}">
          <i class="material-icons">view_module</i>
          <span>Manage Food</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('menu_everyday') ? 'active' : '' }}" href="{{ route('menu_everyday') }}">
        <i class="material-icons">wb_sunny</i>
          <span>Everyday Food</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('con_settings') ? 'active' : '' }}" href="{{ route('con_settings') }}">
          <i class="material-icons">error</i>
          <span>Settings</span>
        </a>
      </li>
    </ul>
  </div>
</aside>