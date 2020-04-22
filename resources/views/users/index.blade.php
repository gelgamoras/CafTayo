@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
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
    </div>
@endsection