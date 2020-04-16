@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Campuses') }}</div>

                <div class="card-body">
                    @include('inc.messages')
                    
                    <a href="{{ route('campus.create') }}" class="btn btn-success btn-sm my-3">Add Campus</a>
                    <table id="foodTable" class="table table-striped table-bordered" cellspacing="0" max-width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">ID</th>
                                <th class="th-sm">Campus</th>
                                <th class="th-sm">Address</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($index->count() > 0)
                                @foreach($index as $campus)
                                    <tr>
                                        <td>{{ $campus->id }}</td>
                                        <td>{{ $campus->name }}</td>
                                        <td>{{ $campus->address }}</td>      
                                        <td>{{ $campus->status }}</td>
                                        <td>
                                            <a href="{{ route('campus.show', $campus->id) }}" class="btn btn-sm btn-primary">{{ __('View') }}</a>
                                            <a href="{{ route('campus.edit', $campus->id) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                            <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('campus-delete-{{ $campus->id }}').submit(); }" class="btn btn-sm btn-primary">
                                                @if($campus->status == 'Active')
                                                    Delete
                                                @else 
                                                    Restore
                                                @endif
                                            </a>

                                            <form id="campus-delete-{{ $campus->id }}" method="POST" action="{{ route('campus.destroy', $campus->id ) }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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