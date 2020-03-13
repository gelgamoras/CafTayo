@extends('layouts.admincon.main')

@section('page_header')
    Preferences 
@endsection

@section('page_top_buttons')

@endsection

@section('subheader')
    Manage preferences for MAIN
@endsection

@section('content')
    <link href="{{ asset('assets/styles/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />     
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-small mb-4 pt-3">
                <div class="card-header border-bottom">
                    <h3 class="mb-0">Manage Period Times</h3> 
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        Breakfast 
                        <div class="form-row mb-2">
                            <div class="form-group col-lg-5">
                                <div class='input-group with-addon-icon-left date datetimepicker'>
                                    <input type='text' class="form-control" placeholder="Start" name="breakfast-start" value="{{ $period['Breakfast']['Start'] }}"/>
                                    <span class="input-group-addon input-group-append">
                                        <span class="input-group-text">
                                            <i class="far fa-clock"></i>
                                        </span> 
                                    </span>
                                </div>
                            </div> 
                            <div class="form-group col-lg-2 text-center"> to </div> 
                            <div class="form-group col-lg-5">
                            <div class='input-group with-addon-icon-left date datetimepicker'>
                                <input type='text' class="form-control" placeholder="End" name="breakfast-end" value="{{ $period['Breakfast']['End'] }}"/>
                                   <span class="input-group-addon input-group-append">
                                       <span class="input-group-text">
                                            <i class="far fa-clock"></i>
                                        </span> 
                                    </span>
                                </div>  
                            </div> 
                        </div> 
                        Lunch
                        <div class="form-row mb-2">
                            <div class="form-group col-lg-5">
                                <div class='input-group with-addon-icon-left date datetimepicker'>
                                    <input type='text' class="form-control" placeholder="Start" name="lunch-start" value="{{ $period['Lunch']['Start'] }}"/>
                                        <span class="input-group-addon input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-clock"></i>
                                            </span> 
                                        </span>
                                    </div>
                                </div> 
                                <div class="form-group col-lg-2 text-center"> to </div> 
                                <div class="form-group col-lg-5">
                                <div class='input-group with-addon-icon-left date datetimepicker'>
                                    <input type='text' class="form-control" placeholder="End" name="lunch-end" value="{{ $period['Lunch']['End'] }}"/>
                                    <span class="input-group-addon input-group-append">
                                        <span class="input-group-text">
                                            <i class="far fa-clock"></i>
                                        </span> 
                                    </span>
                                </div>  
                            </div> 
                        </div> 
                        Afternoon 
                        <div class="form-row mb-2">
                            <div class="form-group col-lg-5">
                                <div class='input-group with-addon-icon-left date datetimepicker'>
                                        <input type='text' class="form-control" placeholder="Start" name="afternoon-start" value="{{ $period['Afternoon']['Start'] }}"/>
                                        <span class="input-group-addon input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-clock"></i>
                                            </span> 
                                        </span>
                                    </div>
                                </div> 
                                <div class="form-group col-lg-2 text-center"> to </div> 
                                <div class="form-group col-lg-5">
                                <div class='input-group with-addon-icon-left date datetimepicker'>
                                    <input type='text' class="form-control" placeholder="End" name="afternoon-end" value="{{ $period['Afternoon']['End'] }}"/>
                                    <span class="input-group-addon input-group-append">
                                        <span class="input-group-text">
                                            <i class="far fa-clock"></i>
                                        </span> 
                                    </span>
                                </div>  
                            </div>  
                        </div> 
                        Dinner
                        <div class="form-row mb-2">
                            <div class="form-group col-lg-5">
                                <div class='input-group with-addon-icon-left date datetimepicker'>
                                        <input type='text' class="form-control" placeholder="Start" name="dinner-start" value="{{ $period['Dinner']['Start'] }}"/>
                                        <span class="input-group-addon input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-clock"></i>
                                            </span> 
                                        </span>
                                    </div>
                                </div> 
                                <div class="form-group col-lg-2 text-center"> to </div> 
                                <div class="form-group col-lg-5">
                                <div class='input-group with-addon-icon-left date datetimepicker'>
                                    <input type='text' class="form-control" placeholder="End" name="dinner-end" value="{{ $period['Dinner']['End'] }}"/>
                                    <span class="input-group-addon input-group-append">
                                        <span class="input-group-text">
                                            <i class="far fa-clock"></i>
                                        </span> 
                                    </span>
                                </div>  
                            </div> 
                        </div> 
                        <div class="form-row">
                            <div class="col-lg-1 offset-lg-10 text-center">
                                <button type="submit" class="btn btn-primary">Save</button> 
                            </div>
                        </div>  
                    </form>  
                </div> 
            </div> 
        </div> 
    </div> 
    <script src="{{ asset('assets/scripts/moment.js') }}"></script> 
    <script src="{{ asset('assets/scripts/bootstrap-datetimepicker.min.js') }}"></script> 
    <script type="text/javascript">
            $(function () {
                $('.datetimepicker').datetimepicker({
                    format: 'LT',
                    icons: {
                        up: 'fas fa-sort-up',
                        down: 'fas fa-sort-down'
                    }, 
                    stepping: 5
                });
            });
    </script>
@endsection