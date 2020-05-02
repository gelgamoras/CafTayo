@extends('layouts.guest.app')

@section('content')
<div class="row">
    <div class="col-xl-8 mx-auto food-image pt-3" style="background-image: url('{{ asset('storage/foodphotos/' . $food->coverphoto) }}')">
        <a class="mt-3 d-inline-block" href="javascript:history.back()">
        <img src="{{ asset('images/back.png') }}" width="20px" class="mb-4"/> 
        </a> 
    </div>
</div>
<div class="row">
    <div class="col-xl-8 mx-auto food-info-card bg-white p-4">
        <div class="row">
            <div class="col pt-1 px-3">
                <h3 class="comic-font comic-font-bold mb-1">{{$food->name}}</h3> 
                <span class="font-weight-regular text-muted">
                    @if($food->categoriesFood['parent_id'] == null)
                        {{$food->categoriesFood['name']}}
                    @else
                        {{$food->categoriesFood->categoriesCategories['name']}}
                    @endif • 120cal • Halal <i class="fas fa-check"></i> </span> 
                <div class="font-weight-regular mt-2">
                    {{$food->description}}
                </div> 
            </div>
        </div>
        <div class="row mt-4 food-details">
            <div class="col-6">
                <span class="font-weight-bold text-uppercase">Ingredients</span>
                <ul class="font-weight-regular pl-4">
                    @foreach($ingredients as $i)
                        <li class="mx-3">{{$i}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6">
                <span class="font-weight-bold text-uppercase">Subcategory</span>
                <br /> 
                <span class="font-weight-regular ml-4">
                    @if($food->categoriesFood->categoriesCategories != null)
                        {{$food->categoriesFood['name']}}
                    @else 
                        N/A
                    @endif
                </span> 
                <br /><br /> 
                <span class="font-weight-bold text-uppercase">Price</span>
                <br /> 
                <h4 class="font-weight-regular ml-4">₱{{$food->price}}</h4> 
            </div>
        </div>
    </div>
    <div class="col-xl-8 bg-white mt-0 mx-auto shadow-blocker">
    </div>
</div> 
@endsection