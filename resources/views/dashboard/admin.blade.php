@extends('layouts.dashboard.main')

@section('page_header', 'System Overview')
@section('subheader', 'Dashboard')

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
@endsection