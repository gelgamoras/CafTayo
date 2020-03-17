@extends('layouts.concessionaire.main')

@section('page_header')
    Everyday Menu
@endsection

@section('page_top_buttons')
    <button type="button" class="btn mt-3 btn-sm btn-outline-success mr-1" data-toggle="modal" data-target="#add-to-menu">
        + Add Food
    </button> 
    <button type="button" class="btn mt-3 btn-sm btn-primary mr-1" onclick="window.location.href='{{route('menu_create')}}'">
        Plan a Menu
    </button> 
@endsection

@section('subheader')
Food enlisted here will appear everyday
@endsection

@section('content')
    <!-- Menu of the Day -->
    <div class="row">
        <!-- Breakfast --> 
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card card-small card-post h-100">
                <div class="card-post__image" style="background-image: url('{{ asset('assets/images/food/sinangag.jpg') }}');"></div>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="text-fiord-blue" href="#">Breakfast</a>
                    </h4>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Ulam</h6> 
                        @foreach($breakfast['Ulam'] as $ulam)
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">{{ $ulam['FoodName'] }}</span>
                                <span class="ml-auto text-right">
                                    <button type="button" class="inv-button text-danger mark-oos" value="{{ $ulam['FoodName'] }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </span>
                            </li>
                        @endforeach 
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Quick Bites</h6> 
                        @foreach($breakfast['Quick Bites'] as $qb)
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">{{ $qb['FoodName'] }}</span>
                                <span class="ml-auto text-right">
                                    <button type="button" class="inv-button text-danger mark-oos" value="{{ $qb['FoodName'] }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </span>
                            </li>
                        @endforeach 
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Sweet Delights</h6> 
                        @foreach($breakfast['Sweet Delights'] as $sd)
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">{{ $sd['FoodName'] }}</span>
                                <span class="ml-auto text-right">
                                    <button type="button" class="inv-button text-danger mark-oos" value="{{ $sd['FoodName'] }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </span>
                            </li>
                        @endforeach 
                    </ul>
                </div>
                <div class="card-footer text-muted border-top py-3">
                    <button type="button" class="mb-2 btn btn-sm btn-secondary mr-1 float-right mark-all-oos" value="Breakfast">Mark All Out of Stock</button>
                </div>
            </div>  
        </div> 

        <!-- Lunch --> 
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card card-small card-post h-100">
                <div class="card-post__image" style="background-image: url('{{ asset('assets/images/food/adobo.jpg') }}');"></div>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="text-fiord-blue" href="#">Lunch</a>
                    </h4>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Ulam</h6> 
                        @foreach($lunch['Ulam'] as $ulam)
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">{{ $ulam['FoodName'] }}</span>
                                <span class="ml-auto text-right">
                                    <button type="button" class="inv-button text-danger mark-oos" value="{{ $ulam['FoodName'] }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </span>
                            </li>
                        @endforeach 
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Quick Bites</h6> 
                        @foreach($lunch['Quick Bites'] as $qb)
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">{{ $qb['FoodName'] }}</span>
                                <span class="ml-auto text-right">
                                    <button type="button" class="inv-button text-danger mark-oos" value="{{ $qb['FoodName'] }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </span>
                            </li>
                        @endforeach 
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Sweet Delights</h6> 
                        @foreach($lunch['Sweet Delights'] as $sd)
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">{{ $sd['FoodName'] }}</span>
                                <span class="ml-auto text-right">
                                    <button type="button" class="inv-button text-danger mark-oos" value="{{ $sd['FoodName'] }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </span>
                            </li>
                        @endforeach 
                    </ul>
                </div>
                <div class="card-footer text-muted border-top py-3">
                    <button type="button" class="mb-2 btn btn-sm btn-secondary mr-1 float-right mark-all-oos" value="Lunch">Mark All Out of Stock</button>
                </div>
            </div>  
        </div> 

        <!-- Afternoon --> 
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card card-small card-post h-100">
                <div class="card-post__image" style="background-image: url('{{ asset('assets/images/food/palabok.jpg') }}');"></div>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="text-fiord-blue" href="#">Afternoon</a>
                    </h4>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Ulam</h6> 
                        @foreach($afternoon['Ulam'] as $ulam)
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">{{ $ulam['FoodName'] }}</span>
                                <span class="ml-auto text-right">
                                    <button type="button" class="inv-button text-danger mark-oos" value="{{ $ulam['FoodName'] }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </span>
                            </li>
                        @endforeach 
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Quick Bites</h6> 
                        @foreach($afternoon['Quick Bites'] as $qb)
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">{{ $qb['FoodName'] }}</span>
                                <span class="ml-auto text-right">
                                    <button type="button" class="inv-button text-danger mark-oos" value="{{ $qb['FoodName'] }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </span>
                            </li>
                        @endforeach 
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Sweet Delights</h6> 
                        @foreach($afternoon['Sweet Delights'] as $sd)
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">{{ $sd['FoodName'] }}</span>
                                <span class="ml-auto text-right">
                                    <button type="button" class="inv-button text-danger mark-oos" value="{{ $sd['FoodName'] }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </span>
                            </li>
                        @endforeach 
                    </ul>
                </div>
                <div class="card-footer text-muted border-top py-3">
                    <button type="button" class="mb-2 btn btn-sm btn-secondary mr-1 float-right mark-all-oos" value="Afternoon">Mark All Out of Stock</button>
                </div>
            </div>  
        </div> 

        <!-- Dinner --> 
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card card-small card-post h-100">
                <div class="card-post__image" style="background-image: url('{{ asset('assets/images/food/sinangag.jpg') }}');"></div>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="text-fiord-blue" href="#">Dinner</a>
                    </h4>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Ulam</h6> 
                        @foreach($dinner['Ulam'] as $ulam)
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">{{ $ulam['FoodName'] }}</span>
                                <span class="ml-auto text-right">
                                    <button type="button" class="inv-button text-danger mark-oos" value="{{ $ulam['FoodName'] }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </span>
                            </li>
                        @endforeach 
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Quick Bites</h6> 
                        @foreach($dinner['Quick Bites'] as $qb)
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">{{ $qb['FoodName'] }}</span>
                                <span class="ml-auto text-right">
                                    <button type="button" class="inv-button text-danger mark-oos" value="{{ $qb['FoodName'] }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </span>
                            </li>
                        @endforeach 
                    </ul>
                    <ul class="list-group list-group-small list-group-flush list-food-category">
                        <h6>Sweet Delights</h6> 
                        @foreach($dinner['Sweet Delights'] as $sd)
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">{{ $sd['FoodName'] }}</span>
                                <span class="ml-auto text-right">
                                    <button type="button" class="inv-button text-danger mark-oos" value="{{ $sd['FoodName'] }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </span>
                            </li>
                        @endforeach 
                    </ul>
                </div>
                <div class="card-footer text-muted border-top py-3">
                    <button type="button" class="mb-2 btn btn-sm btn-secondary mr-1 float-right mark-all-oos" value="Dinner">Mark All Out of Stock</button>
                </div>
            </div>  
        </div> 
    </div>
    <!-- End Menu of the Day -->

    <!-- Modal -->
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
                        <ul class='list-group list-group-small list-group-flush list-food-category'>
                            <h6>Ulam</h6> 
                            @foreach($allfood['Ulam'] as $ulam)
                                <li class='list-group-item d-flex px-3'>
                                    <div class='custom-control custom-checkbox'>
                                        <input type='checkbox' class='custom-control-input' id="{{ $ulam['FoodID'] }}">
                                        <label class='custom-control-label' for="{{ $ulam['FoodID'] }}">{{ $ulam['FoodName'] }}</label>
                                    </div>
                                </li> 
                            @endforeach
                        </ul> 
                        <ul class='list-group list-group-small list-group-flush list-food-category'>
                            <h6>Quick Bites</h6> 
                            @foreach($allfood['Quick Bites'] as $qb)
                                <li class='list-group-item d-flex px-3'>
                                    <div class='custom-control custom-checkbox'>
                                        <input type='checkbox' class='custom-control-input' id="{{ $qb['FoodID'] }}">
                                        <label class='custom-control-label' for="{{ $qb['FoodID'] }}">{{ $qb['FoodName'] }}</label>
                                    </div>
                                </li> 
                            @endforeach
                        </ul> 
                        <ul class='list-group list-group-small list-group-flush list-food-category'>
                            <h6>Sweet Delights</h6> 
                                @foreach($allfood['Sweet Delights'] as $sd)
                                    <li class='list-group-item d-flex px-3'>
                                        <div class='custom-control custom-checkbox'>
                                            <input type='checkbox' class='custom-control-input' id="{{ $sd['FoodID'] }}">
                                            <label class='custom-control-label' for="{{ $sd['FoodID'] }}">{{ $sd['FoodName'] }}</label>
                                        </div>
                                    </li> 
                                @endforeach
                        </ul> 
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add to Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script> 
        $('.mark-oos').click(function(){
            var food_item = $(this).attr('value'); 
            if(confirm("Remove " + food_item + " from the menu?")){

            } else {

            }
        });

        $('.mark-all-oos').click(function(){
            var period = $(this).attr('value'); 
            if(confirm("Remove everything from " + period + "?")){

            } else {

            }
        }); 
    </script> 
@endsection 