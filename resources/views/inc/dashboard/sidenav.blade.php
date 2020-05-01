<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
  <div class="main-navbar">
    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
      <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
        <div class="d-table m-auto">
          <img id="main-logo" class="d-inline-block align-top mr-1" style="max-height: 25px;" src="{{ asset('images/icon-logo-leaf.png') }}" alt="Shards Dashboard">
          <span class="d-none d-md-inline ml-1">Dashboard</span>
        </div>
      </a>
      <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
        <i class="material-icons">&#xE5C4;</i>
      </a>
    </nav>
  </div>
  <div class="nav-wrapper">
      @if(Auth::user()->role == 'Admin')
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
            <span>Users</span>
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
        <li class="nav-item">
          <a class="nav-link {{ Route::is('period.index') ? 'active' : '' }}
                            {{ Route::is('period.create') ? 'active' : '' }} 
                            {{ Route::is('period.edit') ? 'active' : '' }} " href="{{ route('period.index') }}">
            <i class="material-icons">
              query_builder
            </i>
            <span>Periods</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="log-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">assignment</i>
            <span>Logs</span>
          </a>
          <div class="dropdown-menu subnav" aria-labelledby="dropdownMenuButton">
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
            <a class="dropdown-item" href="{{ route('logs.user.index') }}">
              <i class="material-icons ml-3">assignment_ind</i>
              User Logs
            </a>
            <a class="dropdown-item" href="{{ route('logs.campus.index') }}">
              <i class="material-icons ml-3">apartment</i>
              Campus Logs
            </a> 
            <a class="dropdown-item" href="{{ route('logs.period.index') }}">
              <i class="material-icons ml-3">timelapse</i>
              Period Logs
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
        <li class="nav-item">
          <a class="nav-link {{ Route::is('dashboard.mycampuses') ? 'active' : '' }}
                            {{ Route::is('categories.index') ? 'active' : '' }} 
                            {{ Route::is('categories.create') ? 'active' : '' }}" 
              href="{{ route('dashboard.mycampuses') }}">
          <i class="material-icons">apartment</i>
            <span>My Campuses</span>
          </a>
        </li>
      </ul>
      @else 
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Route::is('dashboard.mycampuses') ? 'active' : '' }}" 
            href="{{ route('dashboard.mycampuses') }}">
          <i class="material-icons">home</i>
            <span>{{ Route::is('dashboard.mycampuses') ? 'Home' : 'Back to Home' }}</span>
          </a>
        </li>
      </ul> 
      @if(Request::is('manage/*/*'))
        <h6 class="main-sidebar__nav-title">{{ $campus->name }}</h6> 
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Route::is('menu.index') ? 'active' : '' }}
                               {{ Route::is('menu.create') ? 'active' : '' }}
                               {{ Route::is('menu.show') ? 'active' : '' }}
                               {{ Route::is('menu.edit') ? 'active' : '' }}" 
              href="{{ route('menu.index', $campus) }}">
            <i class="material-icons">book</i>
              <span>Menu</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::is('food.index') ? 'active' : '' }} 
                               {{ Route::is('food.create') ? 'active' : '' }} 
                               {{ Route::is('food.edit') ? 'active' : '' }} " 
              href="{{ route('food.index', $campus) }}">
            <i class="material-icons">restaurant</i>
              <span>Food</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::is('categories.index') ? 'active' : '' }}
                               {{ Route::is('categories.create') ? 'active' : '' }}
                               {{ Route::is('categories.edit') ? 'active' : '' }}" 
              href="{{ route('categories.index', $campus) }}">
            <i class="material-icons">widgets</i>
              <span>Categories</span>
            </a>
          </li>
        </ul> 
      @endif
    @endif
  </div>
</aside>