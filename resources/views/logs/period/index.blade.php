@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Period Logs') }}</div>

                <div class="card-body">
                    @include('inc.messages')
                    
                    <table class="table table-striped table-bordered" cellspacing="0" max-width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">ID</th>
                                <th class="th-sm">User</th>
                                <th class="th-sm">Period</th>
                                <th class="th-sm">Activity</th>
                                <th class="th-sm">Created At</th>
                                <th class="th-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($index->count() > 0)
                                @foreach($index as $logperiod)
                                    <tr>
                                        <td>{{ $logperiod->id }}</td>
                                        <td>{{ $logperiod->user_id }} | {{ $logperiod->userLogPeriod->username }}</td>
                                        <td>{{ $logperiod->period_id }} | {{ $logperiod->periodLogPeriod->name }}</td>
                                        <td>{{ $logperiod->action }}</td>
                                        <td>{{ $logperiod->created_at }}</td>
                                        <td>
                                            <a href="{{ route('campus.show', $logperiod->period_id) }}" class="btn btn-sm btn-primary">{{ __('View Campus') }}</a>
                                            <a href="{{ route('users.show', $logperiod->user_id) }}" class="btn btn-sm btn-primary">{{ __('View User') }}</a>
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