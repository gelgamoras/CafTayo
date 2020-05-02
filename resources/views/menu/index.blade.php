@extends('layouts.dashboard.main')

@section('page_header', 'Manage Menus')
@section('subheader')
    {{ $campus->name }} Campus
@endsection

@section('page_top_buttons')
    <button type="button" class="btn btn-sm btn-primary mr-1"  onclick="window.location.href='{{ route('menu.create', request()->route('campus')) }}'">
        + Plan a Menu
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
         <?php 
            foreach ($index as $menu){         
                $datesString = $menu->dates; 
                $datesArr = explode(', ',  $datesString);        
                ?> 
                var dates = <?php echo json_encode($datesArr); ?>; 
                $('#{{ $menu->id }}').datepicker({
                    daysOfWeekDisabled: [0,1,2,3,4,5,6],
                    orientation: "bottom right"
                });
                $('#{{ $menu->id }}').datepicker('setDates', dates);
                <?php
            }
        ?> 
    </script> 
    <script>
        $(document).ready(function () {
                var table = $('#menuTable').DataTable({
                    columnDefs: [
                        {
                            targets: [ 1, 2 ],   
                            className: 'mdl-data-table__cell--non-numeric'
                        }
                    ]
                });
                $('#search-date').datepicker({
                    daysOfWeekDisabled: [0],
                    orientation: "bottom left"
                }); 
                $('#filter-date').click(function(){
                    var datesearch = $('#search-date').val(); 
                    table.search(datesearch).draw();
                })
                $('#clear-filter').click(function(){
                    jQuery('#menuTable').dataTable().fnFilter(''); 
                });   
            });
    </script> 

@endsection

@section('content')

Filter by date: 
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 mt-2"> 
            <input type="text" id="search-date" class="form-control w-50 d-inline-block" /> 
            <button type="button" class="btn btn-secondary" id="filter-date">Filter</button> 
            <button type="button" class="btn btn-white btn-sm" id="clear-filter">Clear</button>
        </div> 
    </div> 
    <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
            <table id="menuTable" class="mdl-data-table" cellspacing="0" style="width: 100%">
                <thead>
                    <tr>
                        <th class="th-sm text-left">ID
                        </th>
                        <th class="th-sm">Menu Title
                        <th style="display: none;"></th> 
                        </th>
                        <th class="th-sm text-left"  width="30%">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($index as $menu)
                        <tr>
                            <td class="text-left" width="10%">{{ $menu->id }}</td>
                            <td>{{ $menu->name }}</td>
                            <td style='display: none'>{{ $menu->dates }}</td>
                            <td class='text-left'>
                                @if($menu->name != 'Everyday Menu')
                                    <button type='button' class='btn btn-sm btn-secondary' id="{{ $menu->id }}">
                                        <i class='material-icons'>
                                            calendar_today
                                        </i>
                                        Show Dates
                                    </button> 
                                @endif
                                <a href="{{ route('menu.edit', ['campus' => request()->route('campus'), 'menu' => $menu->id]) }}" class="btn btn-sm btn-secondary">
                                    <i class='fas fa-edit'></i>
                                </a>
                                @if($menu->name != 'Everyday Menu')
                                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('menu-delete-{{ $menu->id }}').submit(); }" class="btn btn-sm btn-primary">
                                        <i class="fas fa-trash"></i> 
                                    </a>

                                    <form id="menu-delete-{{ $menu->id }}" method="POST" action="{{ route('menu.destroy', ['campus' => request()->route('campus'), 'menu' => $menu->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID
                        </th>
                        <th>Menu Title
                        <th style="display: none;"></th> 
                        </th>
                        <th>Action
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div> 
    </div> 
@endsection