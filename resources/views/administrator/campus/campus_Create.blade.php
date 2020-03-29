@extends('layouts.administrator.main')

@section('page_header')
    Add a Campus 
@endsection

@section('page_top_buttons')

@endsection

@section('subheader')
    Lorem Ipsum 
@endsection

@section('content')
    <div class="row">
    <div class="col-lg-4">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom" id="periods">
                    <h5 class="mb-0">Campus Details</h5> 
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-row">
                            <div class="form-group w-100 px-1">
                                <label for="name">Name of Campus</label>  
                                <input type="text" class="form-control" placeholder="Name of Campus" name="name" id="name"/> 
                            </div> 
                        </div> 
                        <div class="form-row">
                            <div class="form-group w-100 px-1">
                                <label for="address">Address</label> 
                                <input type="text" class="form-control" placeholder="Where is it located?" name="address" id="address"/>   
                            </div> 
                        </div> 
                        <div class="form-row px-1">
                            <button type="submit" class="btn btn-sm btn-primary">Add Campus</button> 
                        </div> 
                    </form> 
                </div> 
            </div>
        </div> 
    </div>
@endsection 