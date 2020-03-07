@extends('layouts.admincon.main')

@section('page_header')
    Menu of the Day
@endsection

@section('subheader')
<?php
    $date = date('F d, Y'); 

    echo $date; 
?> 
@endsection

@section('content')
    <!-- Menu of the Day -->
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
                        <li class="list-group-item d-flex px-3 out-of-stock">
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
                    <button type="button" class="mb-2 btn btn-sm btn-secondary mr-1 float-right mark-all-oos" value="Breakfast">Mark All Out of Stock</button>
                    <button type="button" class="mb-2 btn btn-sm btn-primary mr-1 float-right">+ Add Food</button> 
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
                    <button type="button" class="mb-2 btn btn-sm btn-secondary mr-1 float-right mark-all-oos" value="Lunch">Mark All Out of Stock</button>
                    <button type="button" class="mb-2 btn btn-sm btn-primary mr-1 float-right">+ Add Food</button> 
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
                    <button type="button" class="mb-2 btn btn-sm btn-secondary mr-1 float-right mark-all-oos" value="Afternoon">Mark All Out of Stock</button>
                    <button type="button" class="mb-2 btn btn-sm btn-primary mr-1 float-right">+ Add Food</button> 
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
                    <button type="button" class="mb-2 btn btn-sm btn-secondary mr-1 float-right mark-all-oos" value="Dinner">Mark All Out of Stock</button>
                    <button type="button" class="mb-2 btn btn-sm btn-primary mr-1 float-right">+ Add Food</button> 
                </div>
            </div>  
        </div> 
    </div>
    <!-- End Menu of the Day -->

    <script> 
        $('.mark-oos').click(function(){
            var food_item = $(this).attr('value'); 
            if(confirm("Mark " + food_item + " out of stock?")){
                $(this).closest('.list-group-item').addClass('out-of-stock'); 
                
                //This only works front end lol just wanted to see how itd look like
            } else {

            }
        });

        $('.mark-all-oos').click(function(){
            var period = $(this).attr('value'); 
            if(confirm("Mark everything in " + period + " menu out of stock?")){
                $(this).closest('.card-footer').siblings('.card-body').find('.list-group-item').addClass('out-of-stock'); 
                
                //This only works front end lol just wanted to see how itd look like
            } else {

            }
        }); 
    </script> 
@endsection 