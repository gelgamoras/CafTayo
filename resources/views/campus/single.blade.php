@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Campuses') }}</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <table class="table table-bordered col-md-6">
                            <thead>
                                <tr>
                                    <td>Property</td>
                                    <td>Value</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $campus->id }}</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $campus->name }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{ $campus->address }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{ $campus->status }}</td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>{{ $campus->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Updated At</td>
                                    <td>{{ $campus->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-center">
                        <a href="{{ route('campus.index') }}" class="btn btn-primary btn-sm m-1">{{ __('Back to Campus List') }}</a>
                        <a href="{{ route('campus.edit', $campus->id) }}" class="btn btn-sm btn-primary m-1">{{ __('Edit') }}</a>
                        <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('campus-delete-{{ $campus->id }}').submit(); }" class="btn btn-sm btn-primary m-1">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection