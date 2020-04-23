@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category Logs') }}</div>

                <div class="card-body">
                    @include('inc.messages')
                    
                    <table class="table table-striped table-bordered" cellspacing="0" max-width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">ID</th>
                                <th class="th-sm">User</th>
                                <th class="th-sm">Category</th>
                                <th class="th-sm">Activity</th>
                                <th class="th-sm">Created At</th>
                                <th class="th-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($index->count() > 0)
                                @foreach($index as $logcategory)
                                    <tr>
                                        <td>{{ $logcategory->id }}</td>
                                        <td>{{ $logcategory->user_id }} | {{ $logcategory->userLogCategory->username }}</td>
                                        <td>{{ $logcategory->category_id }} | {{ $logcategory->categoriesLogCategory->name }}</td>
                                        <td>{{ $logcategory->action }}</td>
                                        <td>{{ $logcategory->created_at }}</td>
                                        <td>
                                            <a href="{{ route('campus.show', $logcategory->category_id) }}" class="btn btn-sm btn-primary">{{ __('View Category') }}</a>
                                            <a href="{{ route('users.show', $logcategory->user_id) }}" class="btn btn-sm btn-primary">{{ __('View User') }}</a>
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