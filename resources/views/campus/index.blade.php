@extends('layouts.main')

@section('page_header', 'Campuses')
@section('subheader', '')

@section('page_top_buttons')
    <button type="button" class="btn btn-sm btn-primary mr-1"  onclick="window.location.href='{{ route('campus.create') }}'">
        + Add Campus
    </button> 
@endsection

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
                    targets: [0, 1, 2, 3, 4],   
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
                        <th class="th-sm">ID
                        </th>
                        <th class="th-sm">Campus
                        <th class="th-sm">Address</th> 
                        </th>
                        <th class="th-sm">Status
                        </th> 
                        <th class="th-sm" width="30%">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($index->count() > 0)
                        @foreach($index as $campus)
                            <tr>
                                <td width="10%">{{ $campus->id }}</td>
                                <td>{{ $campus->name }}</td>
                                <td>{{ $campus->address }}</td>
                                <td>{{ $campus->status }}</td>
                                <td>
                                    <a href="{{ route('campus.edit', $campus->id) }}" class="btn btn-sm btn-secondary">
                                        <i class='fas fa-search'></i>
                                    </a>
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
                <tfoot>
                    <tr>
                    <th class="th-sm">ID
                        </th>
                        <th class="th-sm">Campus
                        <th class="th-sm">Address</th> 
                        </th>
                        <th class="th-sm">Status
                        </th> 
                        <th class="th-sm" width="30%">Action
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div> 
    </div> 
@endsection