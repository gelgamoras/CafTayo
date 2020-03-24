@extends('layouts.concessionaire.main')

@section('page_header')
    Manage Food
@endsection

@section('page_top_buttons')
    <button type="button" class="btn mt-1 btn-sm btn-outline-success mr-1" data-toggle="modal" data-target="#add-to-menu" onclick="window.location.href='{{route('food_create')}}'">
        + New Food
    </button> 
    <button type="button" class="btn mt-1 btn-sm btn-primary mr-1" onclick="window.location.href='{{route('menu_create')}}'">
        Plan a Menu
    </button> 
@endsection

@section('subheader')

@endsection

@section('content')
    Filter by category: 
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 mt-2">
            <div class="">
                <button type="button" class="btn btn-secondary btn-sm" id="ulam-filter">Ulam</button> 
                <button type="button" class="btn btn-secondary btn-sm" id="qb-filter">Quick Bites</button> 
                <button type="button" class="btn btn-secondary btn-sm" id="mer-filter">Meryenda</button> 
                <button type="button" class="btn btn-secondary btn-sm" id="sd-filter">Sweet Delights</button> 
                <button type="button" class="btn btn-secondary btn-sm" id="drinks-filter">Drinks</button>  
                <button type="button" class="btn btn-white btn-sm" id="clear-filter">Clear</button>         
            </div> 
            
        </div>
    </div> 
    <div class="row">
        <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css" /> 
        <link href="{{ asset('css/material-table.css') }}" rel="stylesheet" type="text/css" /> 
        <link href="{{ asset('css/material-datatables.css') }}" rel="stylesheet" type="text/css" /> 
        <script src="{{ asset('js/datatables.min.js') }}"></script>

        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
            <table id="foodTable" class="mdl-data-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">ID
                        </th>
                        <th class="th-sm">Image
                        </th>
                        <th class="th-sm">Food
                        </th>
                        <th class="th-sm">Category
                        </th>
                        <th class="th-sm">Subcategory
                        </th>
                        <th class="th-sm">Price
                        </th>
                        <th class="th-sm">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($food_items as $food)
                        <tr>
                            <td>{{ $food['id'] }}</td>
                            <td><img src="{{ asset('images/food')}}/{{ $food['image'] }}" width=100px height=100px /></td>
                            <td>{{ $food['food'] }}</td>
                            <td>{{ $food['Category'] }}</td>
                            <td>{{ $food['Subcategory'] }}</td>
                            <td>{{ $food['Price'] }}</td>
                            <td >
                                <form action="{{ route('food_detail') }}" method='get' style="display: inline-block;">
                                    <button type='submit' class='btn btn-secondary btn-sm' 
                                        data-toggle='tooltip' data-placement='top' title='View'> 
                                        <i class='fas fa-search'></i>
                                    </button> 
                                </form>
                                <button type='button' class='btn btn-primary delete-btn btn-sm' value="{{ $food['food'] }}" 
                                    onclick="return confirm('Are you sure you want to delete ' + this.value + '?')"> 
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
                    <th>Image
                    </th>
                    <th>Food
                    </th>
                    <th>Category
                    </th>
                    <th>Subcategory
                    </th>
                    <th>Price
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
            var table = $('#foodTable').DataTable({
                columnDefs: [
                    {
                        targets: [0, 1, 2, 3, 4, 5, 6],   
                        className: 'text-left'
                    }
                ]
            });    

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