@extends('layouts.dashboard.main')
    
@section('page_header', '') 


@section('content')
<div class="row">
    <div class="col-lg-7">
        <div class="card card-small">
            <div class="card-header border-bottom">
                <h3 class="mb-0">My Campuses</h3> 
            </div>
            <div class="card-body">
                <span class="font-weight-regular mb-4 d-inline-block">Welcome!🌞 Below is a list of campuses you cater to. Click Manage to manage available food and categories for that campus.</span> 
                <ul class="list-group list-group-small mx-3 list-group-flush">
                    @if($index->count() > 0)
                        @foreach($index as $campus)
                            <li class="list-group-item d-flex" >
                                <span>
                                    <h4 class="font-weight-bold mb-0">{{ $campus->name }}</h4> 
                                    {{ $campus->address }}
                                </span>
                                <span class="ml-auto text-right my-auto">
                                    <a href="{{ route('food.index', $campus) }}" class="btn btn-primary btn-squared">View Food</a> 
                                    <a href="{{ route('categories.index', $campus) }}" class="btn btn-primary btn-squared">View Categories</a> 
                                </span>
                            </li> 
                        @endforeach
                    @endif      
                </ul> 
            </div>
        </div>
    </div>
</div> 

@endsection