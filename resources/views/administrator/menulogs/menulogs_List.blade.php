@extends('layouts.administrator.main')

@section('page_header')
    Menu Logs
@endsection 

@section('page_top_buttons')
<button type="button" class="btn mt-3 btn-sm btn-primary mr-1"  onclick="window.location.href='{{ route('campus_create') }}'">
        + New Campus
</button>
@endsection

@section('subheader')
   Oversee Menu Activities
@endsection

@section('content')
<link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css" /> 
<link href="{{ asset('css/material-table.css') }}" rel="stylesheet" type="text/css" /> 
<link href="{{ asset('css/material-datatables.css') }}" rel="stylesheet" type="text/css" /> 
<script src="{{ asset('js/datatables.min.js') }}"></script>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
        <table id="menuLogsTable" class="mdl-data-table" cellspacing="0" style="width: 100%">
            <thead>
                <tr>
                    <th class="th-sm">ID
                    </th>
                    <th class="th-sm">Column1
                    <th class="th-sm">Column2</th> 
                    </th>
                    <th class="th-sm">Column3</th> 
                    </th>
                    <th class="th-sm">Column4</th> 
                    </th>
                    <th class="th-sm" width="30%">Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="10%">1</td>
                    <td>Data</td>
                    <td>Data</td>
                    <td>Data</td>
                    <td>Data</td>
                    <td>
                        <button type='button' class='btn btn-primary btn-sm' value="Data" onclick="return confirm('Are you sure you want to delete ' + this.value + ' campus?')">  
                            <i class='fas fa-trash'></i>
                        </button> 
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID
                    </th>
                    <th>Campus
                    <th>Address</th> 
                    </th>
                    <th>Action
                    </th>
                </tr>
            </tfoot>
        </table>
    </div> 
</div> 

<script>
    $(document).ready(function () {
        var table = $('#menuLogsTable').DataTable({
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