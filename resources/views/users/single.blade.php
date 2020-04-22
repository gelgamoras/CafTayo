@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Campuses') }}</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <table class="table table-bordered col-md-6">
                            <thead>
                                <tr>
                                    <td>Property</td>
                                    <td>Value</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $user->lastname }}, {{ $user->firstname }} {{ $user->middlename }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <td>Contact Number</td>
                                    <td>{{ $user->contactno }}</td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>{{ $user->role }}</td>
                                </tr>
                                @if($user->role == "Concessionaire")
                                    <tr>
                                        <td>Company</td>
                                        <td>{{ $user->catering }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Status</td>
                                    <td>{{ $user->status }}</td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Updated At</td>
                                    <td>{{ $user->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-center">
                        <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm m-1">{{ __('Back to Users List') }}</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary m-1">{{ __('Edit') }}</a>
                        <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('users-delete-{{ $user->id }}').submit(); }" class="btn btn-sm btn-primary m-1">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection