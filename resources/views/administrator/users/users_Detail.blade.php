@extends('layouts.administrator.main')

@section('page_header')
    User Details
@endsection

@section('page_top_buttons')
    <button type="button" class="btn mt-3 btn-sm btn-primary mr-1"  onclick="window.location.href='#'">
        + Create User
    </button> 
@endsection

@section('subheader')
    Lorem Ipsum
@endsection

@section('content')

<div class="row">
        <div class="col-lg-4">
            <div class="card card-small mb-4 pt-3">
                <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                        <img src="{{ asset('images/avatars')}}/{{ $record['image'] }}" width="200px" height="200px" style="border-radius: 100px" /> 
                    </div> 
                    <h4 class="mb-0">{{ $record['firstName'] }} {{ $record['lastName'] }}</h4> 
                    <span class="text-muted d-block mb-2">{{ $record['role'] }}</span> 
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                        <div class="row justify-content-between">
                            <div class="col-md-6 mb-2">
                                <strong class="text-muted d-block mb-2">Campus</strong> 
                                <span> {{ $record['campus']}}</span> 
                            </div>
                            <div class="col-md-6 mb-2">
                                <strong class="text-muted d-block mb-2">Catering</strong> 
                                <span>{{ $record['catering'] }} </span> 
                            </div> 
                        </div>  
                    </li> 
                </ul>
            </div> 
        </div>
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
                                        <div class="form-group col-md-6">
                                            <label for="firstName">First Name</label> 
                                            <input type="text" name="firstName" class="form-control" id="firstName" 
                                                placeholder="First Name" value="{{ $record['firstName'] }}" /> 
                                        </div> 
                                        <div class="form-group col-md-6">
                                            <label for="lastName">Last Name</label> 
                                            <input type="text" name="lastName" class="form-control" id="lastName" 
                                                placeholder="Last Name" value="{{ $record['lastName'] }}" /> 
                                        </div> 
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="userName">Username</label> 
                                            <input type="text" name="userName" class="form-control" id="userName"
                                                placeholder="Username" value="{{ $record['username'] }}" /> 
                                        </div> 
                                        <div class="form-group col-md-6">
                                            <label for="role">Role</label> 
                                            <select name="role" class="form-control" id="category">
                                                <option selected>{{ $record['role'] }}</option> 
                                                <option value="Administrator">Administrator</option> 
                                                <option value="Concessionaire">Concessionaire</option> 
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="campus">Campus</label>
                                            <select name="campus" class="form-control" id="campus">
                                                <option selected>{{ $record['campus'] }}</option>                                                                                                                                     0
                                                <option value="Taft">Taft</option> 
                                                <option value="SDA">SDA</option> 
                                                <option value="AKIC">AKIC</option> 
                                            </select> 
                                        </div> 
                                        <div class="form-group col-md-8">
                                            <label for="catering">Catering</label> 
                                            <input type="text" name="catering" class="form-control" id="catering"
                                            placeholder="Catering" value="{{ $record['catering'] }}" /> 
                                        </div> 
                                    </div> 
                                    <div class="form-row">
                                        
                                    </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="catering">Email Address</label> 
                                            <input type="text" name="email" class="form-control" id="email"
                                            placeholder="Email Address" value="{{ $record['email'] }}" /> 
                                        </div> 
                                        <div class="form-group col-md-4">
                                            <label for="catering">Contact Number</label> 
                                            <input type="text" name="contact" class="form-control" id="contact"
                                            placeholder="Contact Number" value="{{ $record['contact'] }}" /> 
                                        </div> 
                                        <div class="form-group col-md-4">
                                            <label for="image">Display Image</label>
                                            <input type="file" name="image" class="form-control" id="image" /> 
                                        </div> 
                                    </div> 
                                    <button type="submit" class="btn btn-primary">Update User</button> 
                                </form> 
                            </div> 
                        </div> 
                    </li> 
                </ul> 
            </div>
        </div>  
    </div> 

@endsection
