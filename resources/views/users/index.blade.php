@extends('layouts.dashboard.main')

@section('page_header', 'Users')
@section('subheader', 'Administrators and Concessionaires')

@section('page_top_buttons')
    <button type="button" class="btn mt-3 btn-sm btn-primary mr-1"  onclick="window.location.href='{{ route('users.create') }}'">
        + Create User
    </button> 
@endsection

@section('styles')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('css/material-table.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('css/material-datatables.css') }}" rel="stylesheet" type="text/css" /> 
@endsection

@section('scripts')
    <script src="{{ asset('js/datatables.min.js') }}"></script>
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
@endsection

@section('content')
    
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
                                   
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-search"></i></a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
                                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('users-delete-{{ $user->id }}').submit(); }" class='btn btn-primary delete-btn btn-sm' >
                                        @if($user->status == 'Active')
                                            <i class="fas fa-trash"></i> 
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

@endsection