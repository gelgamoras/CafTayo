@extends('layouts.dashboard.main')


@section('styles')
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />    
@endsection

@section('scripts')
    <script src="{{ asset('js/moment.js') }}"></script> 
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script> 
    <script type="text/javascript">
            $(function () {
                $('.datetimepicker').datetimepicker({
                    format: 'LT',
                    icons: {
                        up: 'fas fa-sort-up',
                        down: 'fas fa-sort-down'
                    }, 
                    stepping: 1
                });
            });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card card-small mb-4 pt-3">
                <div class="card-header border-bottom" id="periods">
                    <h3 class="mb-0">Periods</h3> 
                </div>
                <div class="card-body">
                    <p class="font-weight-light">Set the time when a particular menu will be visible through the app.</p> 
                    <form action="#" method="post">
                        @if($index->count() > 0)
                            @foreach($index as $period)
                                <div class="form-row">
                                    <div class="form-group col-xl-5 mb-1">
                                    <input type="text" value="{{ $period->period }}" class="form-control rounded-0" placeholder="Enter period name" required 
                                        style="border-top: none; border-left: none; border-right: none; font-weight: 500"/> 
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="form-group col-lg-5">
                                        <div class='input-group with-addon-icon-left date datetimepicker'>
                                            <input type='text' class="form-control" placeholder="Start" name="startOf{{ $period->id }}" value="{{ $period->start }}"/>
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
                                        <input type='text' class="form-control" placeholder="End" name="endOf{{ $period->id }}" value="{{ $period->end }}"/>
                                            <span class="input-group-addon input-group-append">
                                                <span class="input-group-text">
                                                    <i class="far fa-clock"></i>
                                                </span> 
                                            </span>
                                        </div>  
                                    </div> 
                                </div> 
                            @endforeach
                        @else 
                            <span class="mb-5 d-inline-block" style="font-weight: 300;">There are no periods in the database.</span> 
                        @endif
                        <div class="form-row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Save</button> 
                            </div>
                        </div>  
                    </form>  
                </div> 
            </div>
        </div>
    </div>
@endsection