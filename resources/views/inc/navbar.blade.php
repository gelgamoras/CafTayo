<nav class="navbar navbar-expand-md navbar-light bg-light">
    <img src="{{ asset('images/icon-logo-leaf.png') }}" class="mr-2" height="30">
        <h4>CafTayo</h4>
    <button class="navbar-toggler" type="button" data-toggle="modal" data-target="#exampleModal">
        <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse text-right" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal"> Subscribe</a> 
            </li>
            <li class="nav-item"> 
                <a href="#" class="mt-1 d-inline-block ml-3" style="font-weight: 400">Login</a> 
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
                <h4 style="font-weight: 600"><strong>Subscribe to Caftayo</strong></h4> 
                <form action="#" method="POST" class="mb-5">
                    <input type="email" name="email" class="form-control" /> 
                    <button type="submit" class="btn mt-3 btn-dark w-100">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
</div>