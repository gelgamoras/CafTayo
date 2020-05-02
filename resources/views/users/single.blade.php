@extends('layouts.dashboard.main')

@section('page_header', 'User Details')
@section('subheader')
<a href="javascript:history.back()" class="btn btn-secondary btn-sm mb-2" style="text-transform: none; letter-spacing: initial;">
    Back
</a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card mb-5">
            <div class="card-header border-bottom">
                <span class="mt-2 d-inline-block">ID: {{ $user->id }}</span> 
                <span class="float-right">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-secondary m-1"><i class="fa fa-edit"></i></a>
                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('user-delete-{{ $user->id }}').submit(); }" class="btn btn-sm btn-primary m-1">
                        @if($user->status == 'Active')
                            <i class="fa fa-trash"></i>  
                        @else 
                            Restore
                        @endif
                    </a>

                    <form id="user-delete-{{ $user->id }}" method="POST" action="{{ route('users.destroy', $user->id ) }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </span>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item px-4 py-4">
                    <strong>Username:</strong> {{ $user-> username }} <br /> 
                    <h2 class="my-1  font-weight-bold d-inline-block">{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</h2> 
                    @if($user->status == 'Active')
                        <span class="d-inline-block badge badge-pill badge-success" style="font-size: 12px; font-weight: 500; letter-spacing: initial; transform: translatey(-7px)">ACTIVE</span>
                    @else
                        <span class="d-inline-block badge badge-pill badge-secondary" style="font-size: 12px; font-weight: 500; letter-spacing: initial; transform: translatey(-7px)">DEACTIVATED</span>
                    @endif
                    </h2>  
                        <br /> 
                    <h5 class="font-weight-bold text-muted d-inline-block mr-1">{{ $user->role }} </h5>
                    @if($user->role == 'Concessionaire')
                        <h5 class="d-inline-block font-weight-bold"> • {{ $user->catering }}</h5> 
                        <br /> 
                        <span class="mr-3"> <i class="fas fa-envelope"></i> {{ $user->email }} </span>
                        <span><i class="fas fa-phone"></i> {{ $user->contactno }} </span> 
                    @else 
                        <span class="mr-3 ml-2"> <i class="fas fa-envelope"></i> {{ $user->email }} </span>
                        <span><i class="fas fa-phone"></i> {{ $user->contactno }} </span> 
                    @endif
                </li> 
                <li class="list-group-item px-4 pb-4">
                    <span class="font-weight-bold text-muted">Created at:</span> {{ $user->created_at }} <br /> 
                    <span class="font-weight-bold text-muted">Updated at:</span> {{ $user->updated_at }}
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection