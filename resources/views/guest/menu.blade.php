@extends('layouts.guest.app')

@section('content')
<div class="row ">
    <div class="col-lg-8 mx-auto mt-4">
        <a href="javascript:history.back()">
        <img src="{{ asset('images/back.png') }}" width="20px" class="mb-4"/> 
        </a> 
    </div>
</div>
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3 comic-font">
                    {{$campus->name}}
                </h3> 
            </div>
            <div class="col-6 text-right">
                <form action="#" method="POST">
                    <div class="input-group w-100 border-bottom float-right">
                        <input type="text" class="search-control"/> 
                        <div class="input-group-append">
                            <i class="fas fa-search mt-2"></i> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row my-1">
            <div class="col">
                Go to: <br /> 

                @foreach($periods as $y=>$p)
                    <a href="#{{ $periods[$y]->period }}" class="btn btn-light btn-small d-inline-block mx-1 mb-1"> {{$p['period']}} </a> 
                @endforeach 

            </div> 
        </div>
        <div class="row my-1">
            <div class="col">
                Filter by: <br /> 

                @foreach($categories as $c)
                    <a href="" class="btn btn-light btn-small d-inline-block mx-1 mb-1"> {{$c->name}} </a> 
                @endforeach 

            </div> 
        </div>
    @if(count($foods)>0)
        @foreach($foods as $i=>$period)
            <div class="row" id="{{ $periods[$i]->period }}">
                <div class="col-md-12 mx-auto mb-2 my-2">
                    <span class="font-weight-bold text-uppercase">
                        {{ $periods[$i]->period }}
                    </span> 
                </div>
            </div> 
            @if(count($period) > 0)
                @foreach($period as $food)
                    <div class="row border-top mx-auto py-4 menu-item">
                        <div class="col-5">
                            <div class="food-list-image" style="background-image: url('{{ asset('storage/foodphotos/' . $food[0]->coverphoto) }}')">
                            </div>  
                        </div> 
                        <div class="col-7">
                            <div class="food-info w-100 h-100 d-flex justify-content-center flex-column">
                                <a href="{{ route('food', ['campus' => request()->route('campus'), 'food' => $food[0]->id]) }}"><h3 class="font-weight-bold mb-1">{{$food[0]->name}}</h3></a>
                                <div class="w-100 font-weight-regular">
                                    @if($food[0]->categoriesFood['parent_id'] == null)
                                        {{$food[0]->categoriesFood['name']}}
                                    @else
                                        {{$food[0]->categoriesFood->categoriesCategories['name']}} • {{$food[0]->categoriesFood['name']}}
                                    @endif
                                    • {{$food[0]->calories}}cal • ₱{{$food[0]->price}}<br /> 
                                    @if($food[0]->isHalal == 'Halal')
                                        • Halal <i class="fas fa-check"></i>
                                    @endif
                                </div>
                                <div class="w-100 font-weight-regular food-desc">
                                    {{$food[0]->shortdescription}}
                                </div> 
                            </div>
                        </div> 
                    </div>
                @endforeach
            @else 
                <div class="row border-top mx-auto py-4 menu-item justify-content-center align-items-center" style="height: 150px">
                    <h6 class="font-weight-featherlight">There are no food being served at this time!</h6> 
                </div>
            @endif 
        @endforeach
    @endif

@endsection