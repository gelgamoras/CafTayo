@extends('layouts.concessionaire.main')

@section('page_header')
    Manage Menus
@endsection

@section('page_top_buttons')
    <button type="button" class="btn mt-1 btn-sm btn-primary mr-1" onclick="window.location.href='/plan-menu'">
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
        <?php
            function get_dummyDataTables(){
                $menu_items_table = array(
                    array(
                        "id"            => "1",
                        "title"         => "The quick", 
                        "date"          => "03/12/2020, 03/18/2020, 03/25/2020, 03/28/2020, 03/21/2020, 03/20/2020"), 
                    array(
                        "id"            => "2",
                        "title"         => "Brown fox", 
                        "date"          => "03/05/2020, 03/31/2020, 03/10/2020, 03/19/2020, 03/25/2020, 03/15/2020"),
                    array(
                        "id"            => "3",
                        "title"         => "Jumps over", 
                        "date"          => "03/12/2020, 03/18/2020, 03/25/2020, 03/28/2020, 03/21/2020, 03/20/2020"),
                    array(
                        "id"            => "4",
                        "title"         => "the lazy dog", 
                        "date"          => "03/12/2020, 03/18/2020, 03/25/2020, 03/28/2020, 03/21/2020, 03/20/2020")            
                );

                foreach ($menu_items_table as $menu){
                    echo "
                    <tr>
                        <td>". $menu['id'] ."</td>
                        <td>". $menu['title'] ."</td>
                        <td style='display: none'>". $menu['date']."</td>
                        <td class='text-center'>
                            <button type='button' class='btn btn-success' id='". $menu['id'] ."'>
                                <i class='material-icons'>
                                    calendar_today
                                </i>
                            </button> 
                            <form action='view-menu' method='get' style='display: inline-block;'>
                                <input type='hidden' value='". $menu['id'] ."' /> 
                                <button type='submit' class='btn btn-info' 
                                    data-toggle='tooltip' data-placement='top' title='View'> 
                                    <i class='fas fa-search'></i>
                                </button> 
                            </form>
                            <button type='button' class='btn btn-danger delete-btn' data-menu-id='". $menu['id'] ."' value='". $menu['title'] ."'> 
                                <i class='fas fa-trash'></i>
                            </button> 
                        </td>
                    </tr>
                    "; 
                }
            }
        ?> 
        <link href="{{ asset('assets/styles/mdb.min.css') }}" /> 
        <script src="{{ asset('assets/scripts/mdb.min.js') }}"></script> 
        <link href="{{ asset('assets/styles/datatables.min.css') }}" rel="stylesheet" type="text/css" /> 
        <script src="{{ asset('assets/scripts/datatables.min.js') }}"></script>

        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
            <table id="menuTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">ID
                        </th>
                        <th class="th-sm">Menu Title
                        <th style="display: none;"></th> 
                        </th>
                        <th class="th-sm">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menu as $menu_item)
                        <tr>
                            <td>{{ $menu_item['id'] }}</td>
                            <td>{{ $menu_item['title'] }}</td>
                            <td style='display: none'>{{ $menu_item['date'] }}</td>
                            <td class='text-center'>
                                <button type='button' class='btn btn-success' id="{{ $menu_item['id'] }}">
                                    <i class='material-icons'>
                                        calendar_today
                                    </i>
                                </button> 
                                <form action='view-menu' method='get' style='display: inline-block;'>
                                    <input type='hidden' value="{{ $menu_item['id'] }}" /> 
                                    <button type='submit' class='btn btn-info' 
                                        data-toggle='tooltip' data-placement='top' title='View'> 
                                        <i class='fas fa-search'></i>
                                    </button> 
                                </form>
                                <button type='button' class='btn btn-danger delete-btn' data-menu-id="{{ $menu_item['id'] }}" value="{{ $menu_item['title'] }}"> 
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

    
    <!-- Delete Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Nope</button>
            <form action="#" method="post">
                <input type="hidden" value="" id="to-delete" /> 
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        </div>
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
        $('.delete-btn').click(function(){
            var menu = $(this).val(); 
            var menuid = $(this).attr("data-food-id"); 
            $('#delete-modal').find('.modal-body').text('Are you sure you want to delete ' + menu + ' menu?'); 
            $('#to-delete').attr("value", menuid)
            $('#delete-modal').modal('toggle'); 
        }); 
    </script> 
    <script>
        $(document).ready(function () {
            var table = $('#menuTable').DataTable();
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