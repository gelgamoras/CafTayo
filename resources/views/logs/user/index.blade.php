@extends('layouts.dashboard.main')

@section('page_header', 'Food Logs')

@section('styles')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('css/material-table.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('css/material-datatables.css') }}" rel="stylesheet" type="text/css" /> 
@endsection

@section('scripts')
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script>
    $(document).ready(function () {
        var table = $('#campusTable').DataTable({
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
        <table id="campusTable" class="mdl-data-table" cellspacing="0" style="width: 100%">
            <thead>
                <tr>
                    <th class="th-sm">ID</th>
                    <th class="th-sm">User</th>
                    <th class="th-sm">Target User</th>
                    <th class="th-sm">Activity</th>
                    <th class="th-sm">Created At</th>
                    <th class="th-sm" width="30%">Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($index->count() > 0)
                    @foreach($index as $loguser)
                        <tr>
                            <td width="10%">{{ $loguser->id }}</td>
                            <td>{{ $loguser->user_id }} | {{ $loguser->u_userLogUser->username }}</td>
                            <td>{{ $loguser->target_id }} | {{ $loguser->t_userLogUser->username }}</td>
                            <td>{{ $loguser->action }}</td>
                            <td>{{ $loguser->created_at }}</td>
                            <td>
                                <a href="{{ route('users.edit', $loguser->target_id) }}" class="btn btn-sm btn-primary">{{ __('View Target') }}</a>
                                @if(Auth::user()->id == $loguser->user_id)
                                    profile link
                                @else
                                    <a href="{{ route('users.edit', $loguser->user_id) }}" class="btn btn-sm btn-primary">{{ __('View User') }}</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach 
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th class="th-sm">ID</th>
                    <th class="th-sm">User</th>
                    <th class="th-sm">Target User</th>
                    <th class="th-sm">Activity</th>
                    <th class="th-sm">Created At</th>
                    <th class="th-sm" width="30%">Action
                    </th>
                </tr>
            </tfoot>
        </table>
    </div> 
</div> 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Logs') }}</div>

                <div class="card-body">
                    @include('inc.messages')
                    
                    <table class="table table-striped table-bordered" cellspacing="0" max-width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">ID</th>
                                <th class="th-sm">User</th>
                                <th class="th-sm">Target User</th>
                                <th class="th-sm">Activity</th>
                                <th class="th-sm">Created At</th>
                                <th class="th-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($index->count() > 0)
                                @foreach($index as $loguser)
                                    <tr>
                                        <td>{{ $loguser->id }}</td>
                                        <td>{{ $loguser->user_id }} | {{ $loguser->u_userLogUser->username }}</td>
                                        <td>{{ $loguser->target_id }} | {{ $loguser->t_userLogUser->username }}</td>
                                        <td>{{ $loguser->action }}</td>
                                        <td>{{ $loguser->created_at }}</td>
                                        <td>
                                            <a href="{{ route('users.show', $loguser->user_id) }}" class="btn btn-sm btn-primary">{{ __('View Target') }}</a>
                                            <a href="{{ route('users.show', $loguser->target_id) }}" class="btn btn-sm btn-primary">{{ __('View User') }}</a>
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