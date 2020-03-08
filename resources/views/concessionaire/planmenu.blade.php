@extends('layouts.admincon.main')

@section('page_header')
    Plan a Menu
@endsection

@section('page_top_buttons')

@endsection

@section('subheader')

@endsection

@section('content')
    <?php
        function get_dummyDataTables(){
            $food_items_table = array(
                array(
                    "id"            => "1",
                    "image"         => "adobo.jpg", 
                    "food"          => "Arroz Caldo w/ Egg", 
                    "Category"      => "Ulam", 
                    "Subcategory"   => "Local", 
                    "Price"         => "P45.00"),
                array(
                    "id"            => "2", 
                    "image"         => "sinigang.jpg",
                    "food"          => "Spicy Chicken Adobo", 
                    "Category"      => "Ulam", 
                    "Subcategory"   => "Local", 
                    "Price"         => "P70.00"),
                array(
                    "id"            => "3", 
                    "image"         => "sinangag.jpg",
                    "food"          => "Cordon Bleu", 
                    "Category"      => "Ulam", 
                    "Subcategory"   => "International", 
                    "Price"         => "P85.00"), 
                array(
                    "id"            => "4", 
                    "image"         => "palabok.jpg", 
                    "food"          => "Ham and Cheese Sandwich", 
                    "Category"      => "Quick Bites", 
                    "Subcategory"   => "Sammich", 
                    "Price"         => "P45.00"),           
                array(
                    "id"            => "5", 
                    "image"         => "adobo.jpg", 
                    "food"          => "Coffee Jelly", 
                    "Category"      => "Sweet Delights", 
                    "Subcategory"   => "Cold", 
                    "Price"         => "P45.00"),              
            );

            foreach ($food_items_table as $food){
                echo "
                <tr>
                    <td>". $food['id'] ."</td>
                    <td class='text-center'><img src='assets/images/food/". $food['image'] ."' width=100px height=100px /></td>
                    <td>". $food['food'] ."</td>
                    <td>". $food['Category'] ."</td>
                    <td>". $food['Subcategory'] ."</td>
                    <td>". $food['Price'] ."</td>
                    <td>
                        <div class='choose-period'>
                            <div class='col-md-2'>
                                <div class='custom-control custom-checkbox'>
                                    <input type='checkbox' name='breakfast[]' class='custom-control-input' id='". $food['id'] ."-bf'>
                                    <label class='custom-control-label' for='". $food['id'] ."-bf'>Breakfast</label>
                                </div>
                            </div> 
                            <div class='col-md-2'>
                                <div class='custom-control custom-checkbox'>
                                    <input type='checkbox' name='lunch[]' class='custom-control-input' id='". $food['id'] ."-l'>
                                    <label class='custom-control-label' for='". $food['id'] ."-l'>Lunch</label>
                                </div>
                            </div> 
                            <div class='col-md-2'>
                                <div class='custom-control custom-checkbox'>
                                    <input type='checkbox' name='afternoon[]' class='custom-control-input' id='". $food['id'] ."-a'>
                                    <label class='custom-control-label' for='". $food['id'] ."-a'>Afternoon</label>
                                </div>
                            </div> 
                            <div class='col-md-2'>
                                <div class='custom-control custom-checkbox'>
                                    <input type='checkbox' name='dinner[]' class='custom-control-input' id='". $food['id'] ."-d'>
                                    <label class='custom-control-label' for='". $food['id'] ."-d'>Dinner</label>
                                </div>
                            </div> 
                        </div> 
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
 
    <form action="#" method="post">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="menu-title" placeholder="Menu Title" /> 
                </div> 
            </div> 
            <div class="col-lg-4 col-md-8 col-sm-12">
                <div class="form-group">
                    <div class="input-group with-addon-icon-left">
                        <input type="text" class="form-control" id="menu-date" placeholder="Date" /> 
                        <span class="input-group-append">
                            <span class="input-group-text">
                                <i style="font-size: 20px" class="fa fa-calendar"></i> 
                            </span>
                        </span>
                    </div> 
                </div> 
            </div> 
        </div> 
        <!-- Menu of the Day -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <table id="selectFoodTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                        <th class="th-sm">Period
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
                        <th>Period
                        </th>
                        </tr>
                    </tfoot>
                </table>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-success">Save</button>  
                </div> 
            </div> 
        </div> 
        <!-- End Menu of the Day -->
    </form>
        <script>
             $('#menu-date').datepicker({
                todayHighlight: true,
                multidate: true,
                multidateSeparator: ", ",
                daysOfWeekDisabled: '0'
            });
        </script> 
        <script>
            $(document).ready(function () {
            $('#selectFoodTable').DataTable();
            $('.dataTables_length').addClass('bs-select');
            });
        </script> 
@endsection

