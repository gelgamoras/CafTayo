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
        <a class="nav-link" href="#">
        <i class="material-icons">home</i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('users.index') ? 'active' : '' }} 
                           {{ Route::is('users.create') ? 'active' : '' }} 
                           {{ Route::is('users.edit') ? 'active' : '' }}" 
                           href="{{ route('users.index') }}">
        <i class="material-icons">account_circle</i>
          <span>Manage Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::is('campus.index') ? 'active' : '' }}
                           {{ Route::is('campus.create') ? 'active' : '' }} 
                           {{ Route::is('campus.edit') ? 'active' : '' }} " href="{{ route('campus.index') }}">
        <i class="material-icons">
          school
        </i>
          <span>Campuses</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="log-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="material-icons">assignment</i>
          <span>Logs</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="{{ route('logs.menu.index') }}">
            <i class="material-icons ml-3">import_contacts</i>
            Menu Logs
          </a>
          <a class="dropdown-item" href="{{ route('logs.food.index') }}">
            <i class="material-icons ml-3">restaurant</i>
            Food Logs
          </a>
          <a class="dropdown-item" href="{{ route('logs.category.index') }}">
            <i class="material-icons ml-3">category</i>
            Category Logs
          </a>
          <a class="dropdown-item" href="{{ route('logs.menu.index') }}">
            <i class="material-icons ml-3">assignment_ind</i>
            User Logs
          </a>
          <a class="dropdown-item" href="{{ route('logs.campus.index') }}">
            <i class="material-icons ml-3">apartment</i>
            Campus Logs
          </a> 
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" 
            href="{{ route('users.index') }}">
        <i class="material-icons">people</i>
          <span>Subscribers</span>
        </a>
      </li>
    </ul>
  </div>
</aside>