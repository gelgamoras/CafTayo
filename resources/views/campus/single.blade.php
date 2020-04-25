@extends('layouts.dashboard.main')

@section('page_header', 'Campus Details')
@section('subheader')
<a href="javascript:history.back()" class="btn btn-secondary btn-sm mb-2" style="text-transform: none; letter-spacing: initial;">
    Back
</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card mb-5">
                <div class="card-header border-bottom">
                    <span class="mt-2 d-inline-block">ID: {{ $campus->id }}</span> 
                    <span class="float-right">
                        <a href="{{ route('campus.edit', $campus->id) }}" class="btn btn-sm btn-secondary m-1"><i class="fa fa-edit"></i></a>
                        <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('campus-delete-{{ $campus->id }}').submit(); }" class="btn btn-sm btn-primary m-1">
                            @if($campus->status == 'Active')
                                <i class="fa fa-trash"></i>  
                            @else 
                                Restore
                            @endif
                        </a>

                        <form id="campus-delete-{{ $campus->id }}" method="POST" action="{{ route('campus.destroy', $campus->id ) }}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </span>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4 py-4">
                       
                        <h2 class="my-1  font-weight-bold d-inline-block">{{ $campus->name }}
                        @if($campus->status == 'Active')
                            <span class="d-inline-block badge badge-pill badge-success" style="font-size: 12px; font-weight: 500; letter-spacing: initial; transform: translatey(-10px)">ACTIVE</span>
                        @else
                        <span class="d-inline-block badge badge-pill badge-secondary" style="font-size: 12px; font-weight: 500; letter-spacing: initial; transform: translatey(-10px)">DEACTIVATED</span>
                        @endif
                        </h2> 
                        <br /> 
                        {{ $campus->address }}
                    </li> 
                    <li class="list-group-item px-4">
                        <span class="font-weight-bold text-muted">Created at:</span> {{ $campus->created_at }} <br /> 
                        <span class="font-weight-bold text-muted">Updated at:</span> {{ $campus->updated_at }}
                    </li>
                    <li class="list-group-item px-4">
                        <span class="float-right">
                            <a href="{{ route('campus.edit', $campus->id) }}" class="btn btn-sm btn-secondary m-1"><i class="fa fa-edit"></i></a>
                            <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('campus-delete-{{ $campus->id }}').submit(); }" class="btn btn-sm btn-primary m-1">
                                @if($campus->status == 'Active')
                                    <i class="fa fa-trash"></i>  
                                @else 
                                    Restore
                                @endif
                            </a>

                            <form id="campus-delete-{{ $campus->id }}" method="POST" action="{{ route('campus.destroy', $campus->id ) }}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection