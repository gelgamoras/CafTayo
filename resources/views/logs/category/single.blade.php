@extends('layouts.dashboard.main')

@section('page_header', 'Category Details')
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
                <span class="mt-2 d-inline-block">ID: {{ $category->id }}</span> 
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item px-4 py-4">
                    <strong>Campus:</strong> {{ $category->campusCategories->name}} <br /> 
                    <h2 class="my-1 font-weight-bold d-inline-block">{{ $category->name }}
                    @if($category->status == 'Active')
                        <span class="d-inline-block badge badge-pill badge-success" style="font-size: 12px; font-weight: 500; letter-spacing: initial; transform: translatey(-7px)">ACTIVE</span>
                    @else
                        <span class="d-inline-block badge badge-pill badge-secondary" style="font-size: 12px; font-weight: 500; letter-spacing: initial; transform: translatey(-7px)">DELETED</span>
                    @endif
                    </h2> <br /> 
                    @if($category->parent_id != null)
                        <h5 class="font-weight-bold text-muted d-inline-block mr-1">{{ $category->categoriesCategories->name }}</h5>
                        <span>(Parent category)</span> 
                    @endif 
                </li>
                <li class="list-group-item px-4 pb-4">
                    <span class="font-weight-bold text-muted">Created at:</span> {{ $category->created_at }} <br /> 
                    <span class="font-weight-bold text-muted">Updated at:</span> {{ $category->updated_at }}
                </li>
            </ul>
        </div> 
    </div>
</div>
@endsection