@extends('layouts.dashboard.main')

@section('page_header', 'Food')
@section('subheader', '')

@section('page_top_buttons')
    <button type="button" class="btn btn-sm btn-primary mr-1"  onclick="window.location.href='{{ route('food.create', request()->route('campus')) }}'">
        + Add Food
    </button> 
@endsection

@section('styles')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('css/material-table.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('css/material-datatables.css') }}" rel="stylesheet" type="text/css" /> 
@endsection

@section('scripts')
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script>
    $(document).ready(function () {
        var table = $('#campusTable').DataTable({
            columnDefs: [
                {
                    targets: [0, 1, 2, 3, 4, 5, 6],   
                    className: 'text-left'
                }
            ], 
            order: [[6,"asc"]]
        }); 
        
        @foreach($categories as $c)
            $('#{{ $c->name }}-filter').click(function(){
                    jQuery('#campusTable').dataTable().fnFilter('{{ $c->name }}'); 
                });   
        @endforeach
        $('#clear-filter').click(function(){
                jQuery('#campusTable').dataTable().fnFilter(''); 
            });   
    });
</script> 
@endsection

@section('content')
    Filter by category: 
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 mt-2">
            <div class="">
                @foreach($categories as $c)
                    <button type="button" class="btn btn-secondary btn-sm" id="{{ $c->name }}-filter">{{ $c->name }}</button>
                @endforeach  
                <button type="button" class="btn btn-white btn-sm" id="clear-filter">Clear</button>         
            </div> 
        </div>
    </div> 
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
            <table id="campusTable" class="mdl-data-table" cellspacing="0" style="width: 100%">
                <thead>
                    <tr>
                        <th class="th-sm">ID
                        </th>
                        <th class="th-sm">Image
                        <th class="th-sm">Food</th> 
                        </th>
                        <th class="th-sm">Category
                        </th> 
                        <th class="th-sm">Subcategory
                        </th> 
                        <th class="th-sm">Price
                        </th> 
                        <th class="th-sm" width="15%">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($index->count() > 0)
                        @foreach($index as $food)
                            <tr>
                                <td width="10%">{{ $food->id }}</td>
                                <td><div class="food-table-image" style="background-image: url('https://www.seriouseats.com/2019/11/20191030-filipino-pancit-palabok-vicky-wasik-32-1500x1125.jpg');"></div></td>
                                <td>{{ $food->name }}</td>
                                <!--this iS A DISASTER IM SORRY I KNOW IM DUMB I-->
                                @foreach($categories as $s_cat)
                                    @if($s_cat->id == $food->category_id)
                                       @if($s_cat->parent_id == null) 
                                            <td>{{ $s_cat->name }}</td> 
                                            <td></td>
                                       @else
                                            @foreach($categories as $p_cat)
                                                @if($p_cat->id == $s_cat->parent_id)
                                                    <td>{{$p_cat->name}}</td>
                                                    <td>{{$s_cat->name}}</td> 
                                                @endif
                                            @endforeach
                                       @endif 
                                    @endif
                                @endforeach
                                <td>₱{{ $food->price }}</td> 
                                <td>
                                    <a href="#" class="btn btn-sm btn-secondary">
                                        <i class='fas fa-search'></i>
                                    </a>
                                    <a href="{{ route('food.edit', ['campus' => request()->route('campus'), 'food' => $food->id]) }}" class="btn btn-sm btn-secondary">
                                        <i class='fas fa-edit'></i>
                                    </a>
                                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('food-delete-{{ $food->id }}').submit(); }" class="btn btn-sm btn-primary">
                                        <i class="fas fa-trash"></i> 
                                    </a>

                                    <form id="food-delete-{{ $food->id }}" method="POST" action="{{ route('food.destroy', ['campus' => request()->route('campus'), 'food' => $food->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach 
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th class="th-sm">ID
                        </th>
                        <th class="th-sm">Image
                        <th class="th-sm">Food</th> 
                        </th>
                        <th class="th-sm">Category
                        </th> 
                        <th class="th-sm">Subcategory
                        </th> 
                        <th class="th-sm">Price
                        </th> 
                        <th class="th-sm" width="15%">Action
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div> 
    </div> 
@endsection
