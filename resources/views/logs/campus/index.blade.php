@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Campus Logs') }}</div>

                <div class="card-body">
                    @include('inc.messages')
                    
                    <table class="table table-striped table-bordered" cellspacing="0" max-width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">ID</th>
                                <th class="th-sm">User</th>
                                <th class="th-sm">Campus</th>
                                <th class="th-sm">Activity</th>
                                <th class="th-sm">Created At</th>
                                <th class="th-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($index->count() > 0)
                                @foreach($index as $logcampus)
                                    <tr>
                                        <td>{{ $logcampus->id }}</td>
                                        <td>{{ $logcampus->user_id }} | {{ $logcampus->userLogCampus->username }}</td>
                                        <td>{{ $logcampus->campus_id }} | {{ $logcampus->campusLogCampus->name }}</td>
                                        <td>{{ $logcampus->action }}</td>
                                        <td>{{ $logcampus->created_at }}</td>
                                        <td>
                                            <a href="{{ route('campus.show', $logcampus->campus_id) }}" class="btn btn-sm btn-primary">{{ __('View Campus') }}</a>
                                            <a href="{{ route('users.show', $logcampus->user_id) }}" class="btn btn-sm btn-primary">{{ __('View User') }}</a>
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