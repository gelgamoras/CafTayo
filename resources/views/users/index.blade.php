@extends('layouts.main')

@section('page_header', 'Users')
@section('subheader', 'Administrators and Concessionaires')

@section('page_top_buttons')
    <button type="button" class="btn mt-3 btn-sm btn-primary mr-1"  onclick="window.location.href='{{ route('users.create') }}'">
        + Create User
    </button> 
@endsection

@section('content')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('css/material-table.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('css/material-datatables.css') }}" rel="stylesheet" type="text/css" /> 
    <script src="{{ asset('js/datatables.min.js') }}"></script>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
            <table id="userTable" class="mdl-data-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">ID
                        </th>
                        <!-- <th class="th-sm">Image
                        </th> -->
                        <th class="th-sm">Name
                        </th>
                        <th class="th-sm">Role
                        </th>
                        <th class="th-sm">Email
                        </th>
                        <th class="th-sm">Status
                        </th>
                        <th class="th-sm">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($index->count() > 0)
                        @foreach($index as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <!-- <td><img src="{{ asset('images/avatars')}}/{{ $user['image'] }}" width=50px height=50px /></td> -->
                                <td>{{ $user->lastname }}, {{ $user->firstname }} {{ $user->middlename }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->status }}</td>
                                <td >
                                    <form action="{{ route('users.edit', $user->id) }}" method='get' style="display: inline-block;">
                                        <button type='submit' class='btn btn-secondary btn-sm' 
                                            data-toggle='tooltip' data-placement='top' title='View'> 
                                            <i class='fas fa-search'></i>
                                        </button> 
                                    </form>
                                    <!-- <button type='button' class='btn btn-primary delete-btn btn-sm' value="{{ $user['name'] }}"
                                        onclick="return confirm('Are you sure you want to delete ' + this.value + '?')"> 
                                        Deactivate
                                    </button> -->
                                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('users-delete-{{ $user->id }}').submit(); }" class='btn btn-primary delete-btn btn-sm' >
                                        @if($user->status == 'Active')
                                            Delete
                                        @else 
                                            Restore
                                        @endif
                                    </a>
                                    <form id="users-delete-{{ $user->id }}" method="POST" action="{{ route('users.destroy', $user->id ) }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach 
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th class="th-sm">ID
                        </th>
                        <!-- <th class="th-sm">Image
                        </th> --> 
                        <th class="th-sm">Name
                        </th>
                        <th class="th-sm">Role
                        </th>
                        <th class="th-sm">Email
                        </th>
                        <th class="th-sm">Status
                        </th>
                        <th class="th-sm">Action
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div> 
    </div>

    <script>
        $(document).ready(function () {
            var table = $('#userTable').DataTable({
                columnDefs: [
                    {
                        targets: [0, 1, 2, 3, 4, 5],   
                        className: 'text-left'
                    }
                ]
            });    
        });
    </script> 

    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    @include('inc.messages')
                    
                    <a href="{{ route('users.create') }}" class="btn btn-success btn-sm my-3">Add User</a>
                    <table class="table table-striped table-bordered" cellspacing="0" max-width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">ID</th>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">Email</th>
                                <th class="th-sm">Role</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($index->count() > 0)
                                @foreach($index as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->lastname }}, {{ $user->firstname }} {{ $user->middlename }}</td>
                                        <td>{{ $user->email }}</td>     
                                        <td>{{ $user->role }}</td> 
                                        <td>{{ $user->status }}</td>
                                        <td>
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-primary">{{ __('View') }}</a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                            <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('users-delete-{{ $user->id }}').submit(); }" class="btn btn-sm btn-primary">
                                                @if($user->status == 'Active')
                                                    Delete
                                                @else 
                                                    Restore
                                                @endif
                                            </a>

                                            <form id="users-delete-{{ $user->id }}" method="POST" action="{{ route('users.destroy', $user->id ) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>   
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>            
                    </table>
                </div>
            </div>
        </div>
    </div> --> 

@endsection