@extends('layouts.dashboard.main')

@section('page_header', 'Food Details')
@section('subheader')
    <a href="javascript:history.back()" class="btn btn-secondary btn-sm mb-2" style="text-transform: none; letter-spacing: initial;">
        Back
    </a>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-5">
        <div class="card card-sm">
            <div class="card-header border-bottom">
                <span class="mt-2 d-inline-block">ID: {{ $food->id }}</span> 
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item px-4 py-4">
                    <strong>Campus:</strong> {{ $food->campusFood->name}} <br /> 
                    <h2 class="my-1 font-weight-bold d-inline-block">{{ $food->name }}
                    @if($food->status == 'Active')
                        <span class="d-inline-block badge badge-pill badge-success" style="font-size: 12px; font-weight: 500; letter-spacing: initial; transform: translatey(-7px)">ACTIVE</span>
                    @else
                        <span class="d-inline-block badge badge-pill badge-secondary" style="font-size: 12px; font-weight: 500; letter-spacing: initial; transform: translatey(-7px)">DELETED</span>
                    @endif
                    </h2> <br /> 
                    <h5 class="font-weight-bold text-muted d-inline-block mr-1">{{ $food->categoriesFood->name }}</h5>
                    • <span class="mx-1">{{ $food->isHalal }} <i class="fas fa-check"></i></span> 	• <span class="mx-1 "><span class="font-weight-regular">₱</span>{{$food->price}} </span> • <span class="mx-1">{{$food->calories}} cal</span>
                </li>
                <li class="list-group-item px-4">
                    <div class="row">
                        <div class="col-4 text-right">
                            <strong>Short description:</strong> 
                        </div> 
                        <div class="col-8 pl-0">
                            {{$food->shortdescription}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 text-right">
                            <strong>Description:</strong> 
                        </div> 
                        <div class="col-8 pl-0">
                            {{$food->description}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 text-right">
                            <strong>Ingredients:</strong> 
                        </div> 
                        <div class="col-8 pl-0">
                            {{$food->ingredients}}
                        </div>
                    </div>
                </li>
                <li class="list-group-item px-4 pb-4">
                    <span class="font-weight-bold text-muted">Created at:</span> {{ $food->created_at }} <br /> 
                    <span class="font-weight-bold text-muted">Updated at:</span> {{ $food->updated_at }}
                </li>
            </ul>
        </div> 
    </div>
</div>

@endsection