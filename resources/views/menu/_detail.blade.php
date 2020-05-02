@extends('layouts.dashboard.main')

@section('page_header', 'Manage Menu')
@section('subheader', 'Add or Update Menu')


@section('page_top_buttons')
<button type="button" class="btn btn-sm btn-outline-success mr-1" data-toggle="modal" data-target="#add-to-menu">
        + Add Food
    </button> 
    <button type="button" class="btn btn-sm btn-primary mr-1" onclick="window.location.href='#'">
        Update
    </button> 
@endsection

@section('scripts')
<script>
    <?php 
        $menu_dates = $menu->dates;   
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
@endsection

@section('content')
<form action="#" method="post">
    <div class="row"> 
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" class="form-control" id="menu-title" placeholder="Menu Title" value="{{$menu->name}}" /> 
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
            <button type="submit" class="btn btn-secondary mt-2">Save</button> 
        </div>
    </div>
</form>
<div class="row">
    @foreach($periods as $key=>$p)

        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card card-small card-post h-100 menu-card card-post--1">
                <div class="card-post__image" style="background-image: url('{{ asset('images/period-'.$p->id.'.jpg') }}');">
                    <a href="#" class="card-post__category badge badge-pill badge-warning">{{ $p->period }}</a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="text-fiord-blue" href="#">{{ $p->period }}</a>
                    </h4>
                    @foreach($categories[($key+1)] as $category)
                        <ul class="list-group list-group-small list-group-flush list-food-category">
                            <h6>{{$category['name']}}</h6> 
                            @foreach($menuitems as $m_item)
                                @if($m_item->menuitemFood->categoriesFood->name == $category['name'] && $m_item->menuitemPeriod->id == $p->id)
                                    <li class="list-group-item d-flex px-3">
                                        <span class="text-semibold text-fiord-blue">{{ $m_item->menuitemFood->name }}</span>
                                        <span class="ml-auto text-right">
                                            <button type="button" class="inv-button text-danger" value="{{ $m_item->menuitemFood->name }}"
                                                onclick="return confirm('Are you sure you want to remove '+ this.value + '?')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </div> 

    @endforeach 
</div> 
@endsection