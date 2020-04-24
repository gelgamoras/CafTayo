@extends('layouts.dashboard.main')

@section('page_header', 'Periods')

@section('page_top_buttons')
    <button type="button" class="btn mt-3 btn-sm btn-primary mr-1"  onclick="window.location.href='{{ route('period.create') }}'">
        + Add Period
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
            var table = $('#periodTable').DataTable({
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
            <table id="periodTable" class="mdl-data-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">ID
                        </th>
                        <th class="th-sm">Period
                        </th>
                        <th class="th-sm">Start
                        </th>
                        <th class="th-sm">End
                        </th>
                        <th class="th-sm">Status
                        </th>
                        <th class="th-sm">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($index->count() > 0)
                        @foreach($index as $period)
                            <tr>
                                <td>{{ $period->id }}</td>
                                <td>{{ $period->period }}</td>
                                <td>{{ $period->start }}</td>
                                <td>{{ $period->end }}</td>
                                <td>{{ $period->status }}</td>
                                <td >
                                   <a href="{{ route('period.edit', $period->id) }}" class="btn btn-sm btn-primary">{{ __('View User') }}</a>
                                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('periods-delete-{{ $period->id }}').submit(); }" class='btn btn-primary delete-btn btn-sm' >
                                        @if($period->status == 'Active')
                                            Delete
                                        @else 
                                            Restore
                                        @endif
                                    </a>
                                    <form id="periods-delete-{{ $period->id }}" method="POST" action="{{ route('period.destroy', $period->id ) }}">
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
                        <!-- <th class="th-sm">Image
                        </th> --> 
                        <th class="th-sm">Name
                        </th>
                        <th class="th-sm">Role
                        </th>
                        <th class="th-sm">Email
                        </th>
                        <th class="th-sm">Status
                        </th>
                        <th class="th-sm">Action
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div> 
    </div>
@endsection