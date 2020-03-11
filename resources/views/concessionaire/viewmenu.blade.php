@extends('layouts.admincon.main')

@section('page_header')
    View Menu 
@endsection

@section('page_top_buttons')

@endsection

@section('subheader')

@endsection

@section('content')
    <!-- Menu of the Day -->
    <form action="#" method="post">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" id="menu-title" placeholder="Menu Title" value="Super Menu" /> 
            </div> 
        </div> 
        <div class="col-md-4">
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
        <div class="col-md-2">
            <button type="submit" class="btn btn-secondary mt-3">Save</button> 
        </div> 
        <div class="col-md-2 text-right">
            <button type="button" class="btn btn-outline-success mt-3" data-toggle="modal" data-target="#add-to-menu">
                + Add Food
            </button> 
        </div> 
    </div> 
    </form>
    <div class="row">
        <!-- Breakfast --> 
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card card-small card-post h-100">
                <div class="card-post__image" style="background-image: url('assets/images/food/sinangag.jpg');"></div>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="text-fiord-blue" href="#">Breakfast</a>
                    </h4>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Ulam</h6> 
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Saver's Meal - Cheesy Hotdog w/ Egg</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Saver's Meal - Cheesy Hotdog w/ Egg">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Saver's Meal - Hotdog w/ Egg</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Saver's Meal - Hotdog w/ Egg">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Saver's Meal - Spam w/ Egg</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Saver's Meal - Spam w/ Egg">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Arroz Caldo w/ Egg</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Arroz Caldo w/ Egg">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Garlic Rice</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Quick Bites</h6> 
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Ham & Cheese Sandwich</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Egg Salad Sandwich</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Hawaiian Pizza</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Sweet Delights</h6> 
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Coffee Jelly</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Mango Jelly</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Mango Graham</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-muted border-top py-3">
                    <button type="button" class="mb-2 btn btn-sm btn-secondary mr-1 float-right mark-all-oos" value="Breakfast">Remove All</button>
                </div>
            </div>  
        </div> 

        <!-- Lunch --> 
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card card-small card-post h-100">
                <div class="card-post__image" style="background-image: url('assets/images/food/adobo.jpg');"></div>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="text-fiord-blue" href="#">Lunch</a>
                    </h4>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Ulam</h6> 
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Saver's Meal - Spam w/ Egg</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Arroz Caldo w/ Egg</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Garlic Rice</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Quick Bites</h6> 
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Ham & Cheese Sandwich</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Egg Salad Sandwich</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Hawaiian Pizza</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Sweet Delights</h6> 
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Coffee Jelly</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Mango Jelly</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Mango Graham</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-muted border-top py-3">
                    <button type="button" class="mb-2 btn btn-sm btn-secondary mr-1 float-right mark-all-oos" value="Lunch">Remove All</button>
                </div>
            </div>  
        </div> 

        <!-- Afternoon --> 
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card card-small card-post h-100">
                <div class="card-post__image" style="background-image: url('assets/images/food/palabok.jpg');"></div>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="text-fiord-blue" href="#">Afternoon</a>
                    </h4>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Ulam</h6> 
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Saver's Meal - Cheesy Hotdog w/ Egg</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Saver's Meal - Hotdog w/ Egg</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Saver's Meal - Spam w/ Egg</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Arroz Caldo w/ Egg</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Quick Bites</h6> 
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Ham & Cheese Sandwich</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Egg Salad Sandwich</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Hawaiian Pizza</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Sweet Delights</h6> 
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Coffee Jelly</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Mango Jelly</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Mango Graham</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-muted border-top py-3">
                    <button type="button" class="mb-2 btn btn-sm btn-secondary mr-1 float-right mark-all-oos" value="Afternoon">Remove All</button>
                </div>
            </div>  
        </div> 

        <!-- Dinner --> 
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card card-small card-post h-100">
                <div class="card-post__image" style="background-image: url('assets/images/food/sinigang.jpg');"></div>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="text-fiord-blue" href="#">Dinner</a>
                    </h4>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Ulam</h6> 
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Saver's Meal - Cheesy Hotdog w/ Egg</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Saver's Meal - Hotdog w/ Egg</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Saver's Meal - Spam w/ Egg</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Arroz Caldo w/ Egg</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Garlic Rice</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Quick Bites</h6> 
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Ham & Cheese Sandwich</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Egg Salad Sandwich</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Hawaiian Pizza</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Sweet Delights</h6> 
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Coffee Jelly</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Mango Jelly</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <span class="text-semibold text-fiord-blue">Mango Graham</span>
                            <span class="ml-auto text-right">
                                <button type="button" class="inv-button text-danger mark-oos" value="Garlic Rice">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-muted border-top py-3">
                    <button type="button" class="mb-2 btn btn-sm btn-secondary mr-1 float-right mark-all-oos" value="Dinner">Remove All</button>
                </div>
            </div>  
        </div> 
    </div>
    <!-- End Menu of the Day -->

    <!-- Modal -->
    <?php
        //sorry tamad mag-isa isa 
        function get_dummyfood_add(){
            
            $dummyFoodList_ulam = array(
                array("name"=>"Food1", "id" => "food1"),
                array("name"=>"Food2", "id" => "food2"),
                array("name"=>"Food3", "id" => "food3"),
                array("name"=>"Food4", "id" => "food4"),
                array("name"=>"Food5", "id" => "food5"),
                array("name"=>"Food6", "id" => "food6"),
                array("name"=>"Food7", "id" => "food7")
            );
            $dummyFoodList_quickBites = array(
                array("name"=>"Food8", "id" => "food8"),
                array("name"=>"Food9", "id" => "food9"),
                array("name"=>"Food10", "id" => "food10"),
                array("name"=>"Food11", "id" => "food11")
            );
            $dummyFoodList_sweetDelights = array(
                array("name"=>"Food12", "id" => "food12"),
                array("name"=>"Food13", "id" => "food13"),
                array("name"=>"Food14", "id" => "food14")
            );

            echo "
                <ul class='list-group list-group-small list-group-flush list-food-category'>
                <h6>Ulam</h6> 
            "; 

            foreach($dummyFoodList_ulam as $ulam){
                echo "
                    <li class='list-group-item d-flex px-3'>
                        <div class='custom-control custom-checkbox'>
                            <input type='checkbox' class='custom-control-input' id='". $ulam['id'] ."'>
                            <label class='custom-control-label' for='". $ulam['id'] ."'>". $ulam['name'] ."</label>
                        </div>
                    </li> 
                "; 
            }

            echo " 
                </ul> 
                <ul class='list-group list-group-small list-group-flush list-food-category'>
                <h6>Quick Bites</h6> 
            ";

            foreach($dummyFoodList_quickBites as $qb){
                echo "
                    <li class='list-group-item d-flex px-3'>
                        <div class='custom-control custom-checkbox'>
                            <input type='checkbox' class='custom-control-input' id='". $qb['id'] ."'>
                            <label class='custom-control-label' for='". $qb['id'] ."'>". $qb['name'] ."</label>
                        </div>
                    </li> 
                "; 
            }

            echo " 
                </ul> 
                <ul class='list-group list-group-small list-group-flush list-food-category'>
                <h6>Sweet Delights</h6> 
            ";

            foreach($dummyFoodList_sweetDelights as $sd){
                echo "
                    <li class='list-group-item d-flex px-3'>
                        <div class='custom-control custom-checkbox'>
                            <input type='checkbox' class='custom-control-input' id='". $sd['id'] ."'>
                            <label class='custom-control-label' for='". $sd['id'] ."'>". $sd['name'] ."</label>
                        </div>
                    </li> 
                "; 
            }
            echo " 
                </ul> 
            ";
        }
    ?>
    <div class="modal fade" id="add-to-menu" tabindex="-1" role="dialog" aria-labelledby="add-to-menu" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#" methtod="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBreakfastLabel">Add to Everyday Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Add to: 
                        <select id="inputState" class="form-control" placeholder="Choose period...">
                            <option>Breakfast</option>
                            <option>Lunch</option>
                            <option>Afternoon</option>
                            <option>Dinner</option>
                        </select>
                        <?php get_dummyfood_add(); ?> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add to Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        <?php 
            $menu_dates ="03/12/2020, 03/18/2020, 03/25/2020, 03/28/2020, 03/21/2020, 03/20/2020";   
            $datesArr = explode(', ',  $menu_dates);        
        ?> 
        var dates = <?php echo json_encode($datesArr); ?>; 
        $('#menu-date').datepicker({
                    daysOfWeekDisabled: [0],
                    orientation: "bottom right",
                    multidate: true
                });
        $('#menu-date').datepicker('setDates', dates);
                
    </script> 
    <script> 
        $('.mark-oos').click(function(){
            var food_item = $(this).attr('value'); 
            if(confirm("Remove " + food_item + " from the menu?")){
               
            } else {

            }
        });

        $('.mark-all-oos').click(function(){
            var period = $(this).attr('value'); 
            if(confirm("Remove everything in " + period + "?")){
               
            } else {

            }
        }); 
    </script> 
@endsection 