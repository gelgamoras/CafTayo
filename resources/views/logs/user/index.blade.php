@extends('layouts.app')

@section('content')
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