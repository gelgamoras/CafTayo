@extends('layouts.concessionaire.main')

@section('page_header')
    Settings
@endsection

@section('page_top_buttons')
    <span style="font-size: 16px">Jump to:  <span class="font-weight-light"> <a href="#profile">Profile</a> | <a href="#periods">Periods</a> | <a href="#subcategories">Subcategories</a></span></span> 
@endsection

@section('subheader')
    Manage settings for Taft campus
@endsection

@section('content')
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />     
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-small mb-4 pt-3" id="profile">
                <div class="card-header border-bottom">
                    <h3 class="mb-0">Profile</h3> 
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 text-center justify-content-center d-flex flex-column">
                            <div class="mb-3 mx-auto">
                                <img src="{{ asset('images/avatars')}}/{{ $user['image'] }}" width="200px" height="200px" style="border-radius: 100px" /> 
                            </div> 
                            <h4 class="mb-0">{{ $user['firstName'] }} {{ $user['lastName'] }}</h4> 
                            <span class="text-muted d-block mb-2">{{ $user['role'] }} | {{ $user['campus'] }} | {{ $user['catering'] }}</span> 
                        </div> 
                        <div class="col-lg-8">
                            <form action="#" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="firstName">First Name</label> 
                                        <input type="text" name="firstName" class="form-control" id="firstName" 
                                            placeholder="First Name" value="{{ $user['firstName'] }}" /> 
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <label for="lastName">Last Name</label> 
                                        <input type="text" name="lastName" class="form-control" id="lastName" 
                                            placeholder="Last Name" value="{{ $user['lastName'] }}" /> 
                                    </div> 
                                </div> 
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="userName">Username</label> 
                                        <input type="text" name="userName" class="form-control" id="userName"
                                            placeholder="Username" value="{{ $user['username'] }}" /> 
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <label for="role">Role</label> 
                                        <input type="text" class="form-control" id="role" value="{{ $user['role'] }}" readonly /> 
                                    </div>
                                </div> 
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="campus">Campus</label>
                                        <select name="campus" class="form-control" id="campus">
                                            <option selected>{{ $user['campus'] }}</option>                                                                                                                                     0
                                            <option value="Taft">Taft</option> 
                                            <option value="SDA">SDA</option> 
                                            <option value="AKIC">AKIC</option> 
                                        </select> 
                                    </div> 
                                    <div class="form-group col-md-8">
                                        <label for="catering">Catering</label> 
                                        <input type="text" name="catering" class="form-control" id="catering"
                                        placeholder="Catering" value="{{ $user['catering'] }}" /> 
                                    </div> 
                                </div> 
                                <div class="form-row">
                                    
                                </div> 
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="catering">Email Address</label> 
                                        <input type="text" name="email" class="form-control" id="email"
                                        placeholder="Email Address" value="{{ $user['email'] }}" /> 
                                    </div> 
                                    <div class="form-group col-md-4">
                                        <label for="catering">Contact Number</label> 
                                        <input type="text" name="contact" class="form-control" id="contact"
                                        placeholder="Contact Number" value="{{ $user['contact'] }}" /> 
                                    </div> 
                                    <div class="form-group col-md-4">
                                        <label for="image">Display Image</label>
                                        <input type="file" name="image" class="form-control" id="image" /> 
                                    </div> 
                                </div> 
                                <button type="submit" class="btn btn-primary">Update Profile</button> 
                            </form> 
                        </div> 
                    </div> 
                </div>
            </div>
        </div> 
    </div> 
    <div class="row">
        <div class="col-xl-4">
            <div class="card card-small mb-4 pt-3">
                <div class="card-header border-bottom" id="periods">
                    <h3 class="mb-0">Periods</h3> 
                </div>
                <div class="card-body">
                    <p class="font-weight-light">Set the time when a particular menu will be visible through the app.</p> 
                    <form action="#" method="post">
                        Breakfast 
                        <div class="form-row mb-2">
                            <div class="form-group col-lg-5">
                                <div class='input-group with-addon-icon-left date datetimepicker'>
                                    <input type='text' class="form-control" placeholder="Start" name="breakfast-start" value="{{ $period['Breakfast']['Start'] }}"/>
                                    <span class="input-group-addon input-group-append">
                                        <span class="input-group-text">
                                            <i class="far fa-clock"></i>
                                        </span> 
                                    </span>
                                </div>
                            </div> 
                            <div class="form-group col-lg-2 text-center"> to </div> 
                            <div class="form-group col-lg-5">
                            <div class='input-group with-addon-icon-left date datetimepicker'>
                                <input type='text' class="form-control" placeholder="End" name="breakfast-end" value="{{ $period['Breakfast']['End'] }}"/>
                                   <span class="input-group-addon input-group-append">
                                       <span class="input-group-text">
                                            <i class="far fa-clock"></i>
                                        </span> 
                                    </span>
                                </div>  
                            </div> 
                        </div> 
                        Lunch
                        <div class="form-row mb-2">
                            <div class="form-group col-lg-5">
                                <div class='input-group with-addon-icon-left date datetimepicker'>
                                    <input type='text' class="form-control" placeholder="Start" name="lunch-start" value="{{ $period['Lunch']['Start'] }}"/>
                                        <span class="input-group-addon input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-clock"></i>
                                            </span> 
                                        </span>
                                    </div>
                                </div> 
                                <div class="form-group col-lg-2 text-center"> to </div> 
                                <div class="form-group col-lg-5">
                                <div class='input-group with-addon-icon-left date datetimepicker'>
                                    <input type='text' class="form-control" placeholder="End" name="lunch-end" value="{{ $period['Lunch']['End'] }}"/>
                                    <span class="input-group-addon input-group-append">
                                        <span class="input-group-text">
                                            <i class="far fa-clock"></i>
                                        </span> 
                                    </span>
                                </div>  
                            </div> 
                        </div> 
                        Afternoon 
                        <div class="form-row mb-2">
                            <div class="form-group col-lg-5">
                                <div class='input-group with-addon-icon-left date datetimepicker'>
                                        <input type='text' class="form-control" placeholder="Start" name="afternoon-start" value="{{ $period['Afternoon']['Start'] }}"/>
                                        <span class="input-group-addon input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-clock"></i>
                                            </span> 
                                        </span>
                                    </div>
                                </div> 
                                <div class="form-group col-lg-2 text-center"> to </div> 
                                <div class="form-group col-lg-5">
                                <div class='input-group with-addon-icon-left date datetimepicker'>
                                    <input type='text' class="form-control" placeholder="End" name="afternoon-end" value="{{ $period['Afternoon']['End'] }}"/>
                                    <span class="input-group-addon input-group-append">
                                        <span class="input-group-text">
                                            <i class="far fa-clock"></i>
                                        </span> 
                                    </span>
                                </div>  
                            </div>  
                        </div> 
                        Dinner
                        <div class="form-row mb-2">
                            <div class="form-group col-lg-5">
                                <div class='input-group with-addon-icon-left date datetimepicker'>
                                        <input type='text' class="form-control" placeholder="Start" name="dinner-start" value="{{ $period['Dinner']['Start'] }}"/>
                                        <span class="input-group-addon input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-clock"></i>
                                            </span> 
                                        </span>
                                    </div>
                                </div> 
                                <div class="form-group col-lg-2 text-center"> to </div> 
                                <div class="form-group col-lg-5">
                                <div class='input-group with-addon-icon-left date datetimepicker'>
                                    <input type='text' class="form-control" placeholder="End" name="dinner-end" value="{{ $period['Dinner']['End'] }}"/>
                                    <span class="input-group-addon input-group-append">
                                        <span class="input-group-text">
                                            <i class="far fa-clock"></i>
                                        </span> 
                                    </span>
                                </div>  
                            </div> 
                        </div> 
                        <div class="form-row">
                            <div class="col-lg-1 offset-lg-10 text-center">
                                <button type="submit" class="btn btn-primary">Save</button> 
                            </div>
                        </div>  
                    </form>  
                </div> 
            </div>
            <div class="card card-small w-100 mb-4 pt-3" id="another">
                <div class="card-header border-bottom">
                    <h3 class="mb-0">Another Menu</h3> 
                </div>
                <div class="card-body">
                    <p class="font-weight-light">It'd be cool if there's another menu over here.</p> 
                </div>  
            </div> 
        </div> 
        <div class="col-xl-8">
            <div class="card card-small mb-4 pt-3" id="subcategory">
                <div class="card-header border-bottom">
                    <h3 class="mb-0">Subcategories</h3> 
                </div>
                <div class="card-body">
                    <p class="font-weight-light">Create custom subcategories to further organize your menu.</p> 
                    <div class="row">
                        <div class="col-lg-4">
                            <h5>Existing Custom Subcategories</h5> 
                            <div class="border mt-2 list-group list-group-small list-group-flush list-subcategory" style="border-radius: 5px;">
                                @foreach($categories as $cat)
                                    <p class="m-0 py-2 px-3 subcat-header">{{ $cat }}</p> 
                                    @foreach($subcategories[$cat] as $subcat)
                                        <div class="list-group-item border-top pl-5 d-flex" style="font-weight: 400">
                                            {{ $subcat }}
                                            <span class="ml-auto text-right">
                                                <button type="submit" class="inv-button text-danger mark-oos" value="{{ $subcat }}"  form="{{ $subcat }}"
                                                    onclick=" return confirm('Are you sure you want to delete ' + this.value + ' ?');">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </span>
                                            <form action="#" id="{{ $subcat }}" class="d-inline-block" method="post">
                                            </form>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div> 
                        </div> 
                        <div class="col-lg-8">
                            <h5>Add a Custom Subcategory</h5>
                            <form class="mt-3" action="#" method="post">
                                <div class="form-row mb-4">
                                    <div class="col-lg-6">
                                        Parent Category
                                        <select class="form-control" name="category" id="category">
                                            <option selected disabled>Choose a category...</option> 
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat }}">{{ $cat }}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="col-lg-10">
                                        Custom Subcategory 
                                        <input type="text" class="form-control" name="subcategory" placeholder="Subcategory" /> 
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-10 ">
                                        <button type="submit" class="btn btn-primary btn-sm ml-auto">Create Subcategory</button> 
                                    </div> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
        </div> 
    </div>
    <script src="{{ asset('js/moment.js') }}"></script> 
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script> 
    <script type="text/javascript">
            $(function () {
                $('.datetimepicker').datetimepicker({
                    format: 'LT',
                    icons: {
                        up: 'fas fa-sort-up',
                        down: 'fas fa-sort-down'
                    }, 
                    stepping: 5
                });
            });
    </script>
@endsection