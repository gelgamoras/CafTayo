@extends('layouts.administrator.main')

@section('page_header')
    Create a User
@endsection

@section('page_top_buttons')

@endsection

@section('subheader')
    Lorem Ipsum
@endsection

@section('content')

<div class="row">
        <div class="col-lg-8">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h5 class="m-0">Account Details</h5> 
                </div> 
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col">
                                <form action="#" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="role">Role</label> 
                                            <select name="role" class="form-control" id="category">
                                                <option selected disabled>Choose a Role...</option> 
                                                <option value="Administrator">Administrator</option> 
                                                <option value="Concessionaire">Concessionaire</option> 
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="firstName">First Name</label> 
                                            <input type="text" name="firstName" class="form-control" id="firstName" 
                                                placeholder="First Name" value="" /> 
                                        </div> 
                                        <div class="form-group col-md-6">
                                            <label for="lastName">Last Name</label> 
                                            <input type="text" name="lastName" class="form-control" id="lastName" 
                                                placeholder="Last Name" value="" /> 
                                        </div> 
                                    </div> 
                                    <div class="form-row">
                                        
                                        <div class="form-group col-md-4">
                                            <label for="userName">Username</label> 
                                            <input type="text" name="userName" class="form-control" id="userName"
                                                placeholder="Username" value="" /> 
                                        </div> 
                                        <div class="form-group col-md-4">
                                            <label for="password">Password</label> 
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Password" value="" /> 
                                        </div> 
                                        <div class="form-group col-md-4">
                                            <label for="conpassword">Confirm Password</label> 
                                            <input type="password" name="conpassword" class="form-control" id="conpassword"
                                                placeholder="Confirm Password" value="" /> 
                                        </div> 
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="campus">Campus</label>
                                            <select name="campus" class="form-control" id="campus">
                                                <option selected disabled>Choose a Campus...</option>                                                                                                                                     0
                                                <option value="Taft">Taft</option> 
                                                <option value="SDA">SDA</option> 
                                                <option value="AKIC">AKIC</option> 
                                            </select> 
                                        </div> 
                                        <div class="form-group col-md-8">
                                            <label for="catering">Catering</label> 
                                            <input type="text" name="catering" class="form-control" id="catering"
                                            placeholder="Catering" value="" /> 
                                        </div> 
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="catering">Email Address</label> 
                                            <input type="text" name="email" class="form-control" id="email"
                                            placeholder="Email Address" value="" /> 
                                        </div> 
                                        <div class="form-group col-md-4">
                                            <label for="catering">Contact Number</label> 
                                            <input type="text" name="contact" class="form-control" id="contact"
                                            placeholder="Contact Number" value="" /> 
                                        </div> 
                                        <div class="form-group col-md-4">
                                            <label for="image">Display Image</label>
                                            <input type="file" name="image" class="form-control" id="image" /> 
                                        </div> 
                                    </div> 
                                    <button type="submit" class="btn btn-primary">Create User</button> 
                                </form> 
                            </div> 
                        </div> 
                    </li> 
                </ul> 
            </div>
        </div>  
    </div> 

@endsection
