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
                    format: 'HH:mm:ss',
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
            <div class="card card-small mb-4">
                <div class="card-header border-bottom" id="periods">
                    <h3 class="mb-0">Periods</h3> 
                </div>
                <div class="card-body">
                    <p class="font-weight-light">Set the time when a particular menu will be visible through the app.</p> 
                    <form action="{{ route('periods.update') }}" method="post">
                        @csrf
                        @method('PUT')
                        
                        @if($index->count() > 0)
                            @foreach($index as $period)
                                <div class="form-row">
                                    <div class="form-group col-xl-5 mb-1">
                                        <input id="period-{{ $period->id }}" type="text" name="period[{{ $period->id }}]" value="{{ $period->period }}" class="form-control rounded-0 {{ $errors->has('period.' . $period->id) ? 'is-invalid' : '' }}" placeholder="Enter period name" style="border-top: none; border-left: none; border-right: none; font-weight: 500"/> 
                                        
                                        @if($errors->has('period.' . $period->id))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('period.' . $period->id) }}</strong>
                                            </span> 
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="form-group col-lg-5">
                                        <div class='input-group with-addon-icon-left date datetimepicker'>
                                            <input id="timestart-{{ $period->id }}" type='text' class="form-control {{ $errors->has('timestart.' . $period->id) ? 'is-invalid' : '' }}" placeholder="Start" name="timestart[{{ $period->id }}]" value="{{ $period->start }}"/>
                                            <span class="input-group-addon input-group-append">
                                                <span class="input-group-text">
                                                    <i class="far fa-clock"></i>
                                                </span> 
                                            </span>

                                            @if($errors->has('timestart.' . $period->id))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('timestart.' . $period->id) }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div> 
                                    <div class="form-group col-lg-2 text-center"> to </div> 
                                    <div class="form-group col-lg-5">
                                    <div class='input-group with-addon-icon-left date datetimepicker'>
                                        <input id="timeend-{{ $period->id }}" type='text' class="form-control {{ $errors->has('timeend.' . $period->id) ? 'is-invalid' : '' }}" placeholder="End" name="timeend[{{ $period->id }}]" value="{{ $period->end }}"/>
                                            <span class="input-group-addon input-group-append">
                                                <span class="input-group-text">
                                                    <i class="far fa-clock"></i>
                                                </span> 
                                            </span>

                                            @if($errors->has('timeend.' . $period->id))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('timeend.' . $period->id) }}</strong>
                                                </span>
                                            @endif
                                        </div>  
                                    </div> 
                                </div> 
                            @endforeach
                            <div class="form-row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Save</button> 
                                </div>
                            </div>  
                        @else 
                            <span class="mb-5 d-inline-block" style="font-weight: 300;">There are no periods in the database.</span> 
                        @endif
                    </form>  
                </div> 
            </div>
        </div>
    </div>
@endsection