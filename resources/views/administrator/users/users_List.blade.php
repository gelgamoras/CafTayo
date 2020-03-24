@extends('layouts.administrator.main')

@section('page_header')
    Users
@endsection

@section('page_top_buttons')
    <button type="button" class="btn mt-3 btn-sm btn-primary mr-1"  onclick="window.location.href='#'">
        + Create User
    </button> 
@endsection

@section('subheader')
    Administrators and Concessionaires
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
                        <th class="th-sm">Image
                        </th>
                        <th class="th-sm">Name
                        </th>
                        <th class="th-sm">Role
                        </th>
                        <th class="th-sm">Campus
                        </th>
                        <th class="th-sm">Catering
                        </th>
                        <th class="th-sm">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $user)
                        <tr>
                            <td>{{ $user['id'] }}</td>
                            <td><img src="{{ asset('images/avatars')}}/{{ $user['image'] }}" width=50px height=50px /></td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['role'] }}</td>
                            <td>{{ $user['campus'] }}</td>
                            <td>{{ $user['catering'] }}</td>
                            <td >
                                <form action="{{ route('food_detail') }}" method='get' style="display: inline-block;">
                                    <button type='submit' class='btn btn-secondary btn-sm' 
                                        data-toggle='tooltip' data-placement='top' title='View'> 
                                        <i class='fas fa-search'></i>
                                    </button> 
                                </form>
                                <button type='button' class='btn btn-primary delete-btn btn-sm' value="{{ $user['name'] }}"
                                    onclick="return confirm('Are you sure you want to delete ' + this.value + '?')"> 
                                    <i class='fas fa-trash'></i>
                                </button> 
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
                <tfoot>
                    <tr>
                    <th>ID
                    </th>
                    <th>Image
                    </th>
                    <th>Food
                    </th>
                    <th>Category
                    </th>
                    <th>Subcategory
                    </th>
                    <th>Price
                    </th>
                    <th>Action
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
                        targets: [0, 1, 2, 3, 4, 5, 6],   
                        className: 'text-left'
                    }
                ]
            });    
        });
    </script> 
@endsection