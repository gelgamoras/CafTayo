<nav class="navbar navbar-expand-md navbar-light bg-white">
    <img src="{{ asset('images/icon-logo-leaf.png') }}" class="mr-2" height="30">
        <h3 class="comic-font mb-0">CafTayo</h3>
    <button class="navbar-toggler p-0" style="font-size: 24px; color: black; border:none;" type="button" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-bars"></i>
    </button> 
    <div class="collapse navbar-collapse text-right" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="#" class="btn btn-black" data-toggle="modal" data-target="#exampleModal"> Subscribe</a> 
            </li>
            <li class="nav-item"> 
                @guest 
                    <a href="{{ route('login') }}" class="mt-1 d-inline-block ml-3" style="font-weight: 400;">Login</a> 
                @endguest
                @auth 
                    <a href="{{ route('dashboard.index') }}" class="mt-1 d-inline-block ml-3" style="font-weight: 400;">Dashboard</a> 
                @endauth
            </li>
        </ul> 
    </div>
</nav> 

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="transform: translateY(30vh);" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h4 class="font-weight-bold"><strong>Subscribe to Caftayo</strong></h4> 
                <form action="#" method="POST" class="mb-5">
                    <input type="email" name="email" class="form-control" /> 
                    <button type="submit" class="btn mt-3 mb-2 btn-black w-100">Subscribe</button>
                    <a href="{{ route('login') }}" style="font-weight: 300;">Login</a>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
</div>