@extends('layouts.dashboard.main')

@section('page_header', 'Period Logs')

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
                    <th class="th-sm">Period</th>
                    <th class="th-sm">Activity</th>
                    <th class="th-sm">Created At</th>
                    <th class="th-sm" width="30%">Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($index->count() > 0)
                    @foreach($index as $logperiod)
                        <tr>
                            <td width="10%">{{ $logperiod->id }}</td>
                            <td>{{ $logperiod->user_id }} | {{ $logperiod->userLogPeriod->username }}</td>
                            <td>{{ $logperiod->period_id }} | {{ $logperiod->periodLogPeriod->name }}</td>
                            <td>{{ $logperiod->action }}</td>
                            <td>{{ $logperiod->created_at }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">{{ __('View Campus') }}</a>
                                @if(Auth::user()->id == $logperiod->user_id)
                                    <a href="#" class="btn btn-sm btn-primary">{{ __('View User') }}</a>
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
                    <th class="th-sm">Period</th>
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
@endsection