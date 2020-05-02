@extends('layouts.dashboard.main')

@section('page_header', 'Category Logs')

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
                    <th class="th-sm">Category</th>
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
                            <td width="10%">{{ $logcategory->id }}</td>
                            <td>{{ $logcategory->user_id }} | {{ $logcategory->userLogCategory->username }}</td>
                            <td>{{ $logcategory->category_id }} | {{ $logcategory->categoriesLogCategory->name }}</td>
                            <td>{{ $logcategory->action }}</td>
                            <td>{{ $logcategory->created_at }}</td> 
                            <td>
                                <a href="{{ route('logs.category.show', $logcategory->category_id) }}" class="btn btn-sm btn-primary">{{ __('View Category') }}</a>
                                <a href="{{ route('users.show', $logcategory->user_id) }}" class="btn btn-sm btn-primary">{{ __('View User') }}</a>
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