@extends('layouts.dashboard.main')

@section('page_header', 'Menu Logs')

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
                    <th class="th-sm">Menu</th>
                    <th class="th-sm">Activity</th>
                    <th class="th-sm">Created At</th>
                    <th class="th-sm" width="30%">Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($index->count() > 0)
                    @foreach($index as $logcategory)
                        <tr>
                            <td width="10%">{{ $logmenu->id }}</td>
                            <td>{{ $logmenu->user_id }} | {{ $logmenu->userLogMenu->username }}</td>
                            <td>{{ $logmenu->menu_id }} | {{ $logmenu->menuLogMenu->name }}</td>
                            <td>{{ $logmenu->action }}</td>
                            <td>{{ $logmenu->created_at }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">{{ __('View Category') }}</a>
                                @if(Auth::user()->id == $logmenu->user_id)
                                    profile link
                                @else
                                    <a href="{{ route('users.edit', $logmenu->user_id) }}" class="btn btn-sm btn-primary">{{ __('View User') }}</a>
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
                    <th class="th-sm">Category</th>
                    <th class="th-sm">Activity</th>
                    <th class="th-sm">Created At</th>
                    <th class="th-sm" width="30%">Action
                    </th>
                </tr>
            </tfoot>
        </table>
    </div> 
</div> 
    
@endsection