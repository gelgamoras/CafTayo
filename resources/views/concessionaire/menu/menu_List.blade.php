@extends('layouts.concessionaire.main')

@section('page_header')
    Manage Menus
@endsection

@section('page_top_buttons')
    <button type="button" class="btn mt-1 btn-sm btn-primary mr-1" onclick="window.location.href='{{route('menu_create')}}'">
        Plan a Menu
    </button> 
@endsection

@section('subheader')

@endsection

@section('content')
    Filter by date: 
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 mt-2"> 
            <input type="text" id="search-date" class="form-control w-50 d-inline-block" /> 
            <button type="button" class="btn btn-secondary" id="filter-date">Filter</button> 
        </div> 
    </div> 
    <div class="row">
        <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css" /> 
        <link href="{{ asset('css/material-table.css') }}" rel="stylesheet" type="text/css" /> 
        <link href="{{ asset('css/material-datatables.css') }}" rel="stylesheet" type="text/css" /> 
        <script src="{{ asset('js/datatables.min.js') }}"></script>
        

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
                    @foreach($menu as $menu_item)
                        <tr>
                            <td class="text-left" width="10%">{{ $menu_item['id'] }}</td>
                            <td>{{ $menu_item['title'] }}</td>
                            <td style='display: none'>{{ $menu_item['date'] }}</td>
                            <td class='text-left'>
                                <button type='button' class='btn btn-sm btn-secondary' id="{{ $menu_item['id'] }}">
                                    <i class='material-icons'>
                                        calendar_today
                                    </i>
                                </button> 
                                <form action="{{ route('menu_detail') }}" method='get' style='display: inline-block;'>
                                    <input type='hidden' value="{{ $menu_item['id'] }}" /> 
                                    <button type='submit' class='btn btn-secondary btn-sm' 
                                        data-toggle='tooltip' data-placement='top' title='View'> 
                                        <i class='fas fa-search'></i>
                                    </button> 
                                </form>
                                <button type='button' class='btn btn-primary btn-sm' value="{{ $menu_item['title'] }}" onclick="return confirm('Are you sure you want to delete ' + this.value + ' menu?')">  
                                    <i class='fas fa-trash'></i>
                                </button> 
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

    <script> 
        <?php 
            foreach ($menu as $menu_item){         
                $datesString = $menu_item['date']; 
                $datesArr = explode(', ',  $datesString);        
                ?> 
                var dates = <?php echo json_encode($datesArr); ?>; 
                $('#<?php echo $menu_item['id']; ?>').datepicker({
                    daysOfWeekDisabled: [0,1,2,3,4,5,6],
                    orientation: "bottom right"
                });
                $('#<?php echo $menu_item['id']; ?>').datepicker('setDates', dates);
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
        });
    </script> 
    <script> 
    </script> 

@endsection