@extends('layouts.admincon.main')

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
    Search by category: 
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 mt-2">
            <button type="button" class="btn btn-secondary" id="ulam-filter">Ulam</button> 
            <button type="button" class="btn btn-secondary" id="qb-filter">Quick Bites</button> 
            <button type="button" class="btn btn-secondary" id="mer-filter">Meryenda</button> 
            <button type="button" class="btn btn-secondary" id="sd-filter">Sweet Delights</button> 
            <button type="button" class="btn btn-secondary" id="drinks-filter">Drinks</button> 
            <button type="button" class="btn btn-white" id="clear-filter">Clear</button> 
        </div>
    </div> 
    <div class="row">
        <?php
            function get_dummyDataTables(){
                $menu_items_table = array(
                    array(
                        "id"            => "1",
                        "title"         => "Menu 1", 
                        "date"          => "03/12/2020, 03/18/2020, 03/25/2020, 03/28/2020, 03/21/2020, 03/20/2020"), 
                    array(
                        "id"            => "2",
                        "title"         => "Menu 2", 
                        "date"          => "03/12/2020, 03/18/2020, 03/25/2020, 03/28/2020, 03/21/2020, 03/20/2020"),
                    array(
                        "id"            => "3",
                        "title"         => "Menu 3", 
                        "date"          => "03/12/2020, 03/18/2020, 03/25/2020, 03/28/2020, 03/21/2020, 03/20/2020"),
                    array(
                        "id"            => "3",
                        "title"         => "Menu 4", 
                        "date"          => "03/12/2020, 03/18/2020, 03/25/2020, 03/28/2020, 03/21/2020, 03/20/2020")            
                );

                foreach ($menu_items_table as $menu){
                    echo "
                    <tr>
                        <td>". $menu['id'] ."</td>
                        <td>". $menu['title'] ."</td>
                        <td>". $menu['date'] ."</td>
                        <td class='text-center'>
                            <form action='view-food' method='get' style='display: inline-block;'>
                                <input type='hidden' value='". $menu['id'] ."' /> 
                                <button type='submit' class='btn btn-info' 
                                    data-toggle='tooltip' data-placement='top' title='View'> 
                                    <i class='fas fa-search'></i>
                                </button> 
                            </form>
                            <button type='button' class='btn btn-danger delete-btn' data-food-id='". $menu['id'] ."' value='". $menu['title'] ."'> 
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
            <table id="foodTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">ID
                        </th>
                        <th class="th-sm">Menu Title
                        </th>
                        <th class="th-sm">Dates
                        </th>
                        <th class="th-sm">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php get_dummyDataTables(); ?> 
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID
                        </th>
                        <th>Menu Title
                        </th>
                        <th>Dates
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
            <h5 class="modal-title" id="exampleModalLabel">Delete food</h5>
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
        $(document).ready(function () {
            var table = $('#foodTable').DataTable();    

            $('#ulam-filter').click(function(){
                jQuery('#foodTable').dataTable().fnFilter('ulam'); 
            });
            $('#qb-filter').click(function(){
                jQuery('#foodTable').dataTable().fnFilter('quick bites'); 
            });
            $('#sd-filter').click(function(){
                jQuery('#foodTable').dataTable().fnFilter('sweet delights'); 
            });
            $('#mer-filter').click(function(){
                jQuery('#foodTable').dataTable().fnFilter('meryenda'); 
            });
            $('#drinks-filter').click(function(){
                jQuery('#foodTable').dataTable().fnFilter('drinks'); 
            });
            $('#clear-filter').click(function(){
                jQuery('#foodTable').dataTable().fnFilter(''); 
            });
        });
    </script> 
    <script> 
        $('.delete-btn').click(function(){
            var food = $(this).val(); 
            var foodid = $(this).attr("data-food-id"); 
            $('#delete-modal').find('.modal-body').text('Are you sure you want to delete ' + food + '?'); 
            $('#to-delete').attr("value", foodid)
            $('#delete-modal').modal('toggle'); 
        }); 
    </script> 

@endsection