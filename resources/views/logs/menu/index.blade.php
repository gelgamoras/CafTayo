@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Food Logs') }}</div>

                <div class="card-body">
                    @include('inc.messages')
                    
                    <table class="table table-striped table-bordered" cellspacing="0" max-width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">ID</th>
                                <th class="th-sm">User</th>
                                <th class="th-sm">Food</th>
                                <th class="th-sm">Activity</th>
                                <th class="th-sm">Created At</th>
                                <th class="th-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($index->count() > 0)
                                @foreach($index as $logfood)
                                    <tr>
                                        <td>{{ $logfood->id }}</td>
                                        <td>{{ $logfood->user_id }} | {{ $logfood->userLogFood->username }}</td>
                                        <td>{{ $logfood->food_id }} | {{ $logfood->foodLogFood->name }}</td>
                                        <td>{{ $logfood->action }}</td>
                                        <td>{{ $logfood->created_at }}</td>
                                        <td>
                                            <a href="{{ route('campus.show', $logfood->food_id) }}" class="btn btn-sm btn-primary">{{ __('View Food') }}</a>
                                            <a href="{{ route('users.show', $logfood->user_id) }}" class="btn btn-sm btn-primary">{{ __('View User') }}</a>
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