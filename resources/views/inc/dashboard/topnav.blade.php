<nav class="navbar align-items-stretch justify-content-end navbar-light flex-md-nowrap p-0">
  <ul class="navbar-nav border-left flex-row ">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        
        @if( auth()->user()->coverphoto == null)
            <img src="{{ asset('images/icon-logo-leaf.png')}}" class="user-avatar rounded-circle mr-2" width="40px" height="40px" alt="User Avatar" /> 
        @else 
            <img src="{{ asset('storage/coverphotos/' . Auth::user()->coverphoto) }}" class="user-avatar rounded-circle mr-2" width="40px" height="40px" alt="User Avatar"/> 
        @endif
        <span class="d-none d-md-inline-block">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }} - {{ Auth::user()->role }}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-small">
        <a class="dropdown-item" href="{{ route('dashboard.profile.edit') }}">
          <i class="material-icons">&#xE7FD;</i> Profile</a>
        <a class="dropdown-item" href="{{ route('dashboard.password.edit') }}">
          <i class="material-icons">vertical_split</i>Change Password</a>
        <a class="dropdown-item" href="#">
          <i class="material-icons">note_add</i>Settings</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
           <i class="material-icons text-danger">&#xE879;</i> {{ __('Logout') }} </a>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    </li>
  </ul>
  <nav class="nav">
    <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
      <i class="material-icons">&#xE5D2;</i>
    </a>
  </nav>
</nav>