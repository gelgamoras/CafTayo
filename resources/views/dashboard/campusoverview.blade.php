@extends('layouts.dashboard.main')

@section('page_header')
    {{ $campus->name }} Campus
@endsection
@section('subheader', 'Campus Overview')

@section('content')
<div class="row">
    @foreach($stats as $i=>$stat)
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <h4 class="stats-small__value count my-3" style="font-size: 2.5rem">{{ $stat['count'] }}</h4>
                            <span class="stats-small__label text-uppercase">{{ $stat['name'] }}</span>  
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    @endforeach
</div> 
<div class="row mt-4">
    <div class="col-lg-6">
        <h2 class="font-weight-bold">Get Started</h2> 
        <p class="pl-3" style="font-size: 1.2rem">
        ✏️ <a href="{{ route('categories.create', $campus) }}"><u>Create categories</u></a> <br /> 
        🥓 <a href="{{ route('food.create', $campus) }}"><u>Add food items</u></a> <br /> 
        📅 <a href="{{ route('menu.create', $campus) }}"><u>Plan a menu</u></a>  </p> 
    </div>
</div> 
@endsection