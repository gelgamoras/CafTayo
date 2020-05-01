@extends('layouts.dashboard.main')

@section('page_header', 'Plan a Menu')

@section('page_top_buttons')
    <button type="submit" class="btn btn-primary" onclick="document.getElementById('menu-create').submit();">
        Save Menu
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
            var table = $('#selectFoodTable').DataTable({
                columnDefs: [
                    {
                        targets: [0, 1, 2, 3, 4, 5, 6],   
                        className: 'text-left'
                    }
                ]
            }); 
   
            @foreach($categories as $c)
                $('#{{ $c->id }}-filter').click(function(){
                    jQuery('#selectFoodTable').dataTable().fnFilter('{{ $c->name }}'); 
                });   
            @endforeach
            $('#clear-filter').click(function(){
                jQuery('#selectFoodTable').dataTable().fnFilter(''); 
            });
        });
    </script> 
    <script>
            $('#menu-date').datepicker({
            todayHighlight: true,
            multidate: true,
            multidateSeparator: ", ",
            daysOfWeekDisabled: '0'
        });
    </script> 
    <script>
        $(document).ready(function () {
            $('#selectFoodTable').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script> 
@endsection


@section('content')
    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif

    <form id="menu-create" action="{{ route('menu.store', request()->route('campus')) }}" method="post">
        @csrf 

        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="menu-title" placeholder="Menu Title" name="name" value="{{ old('name') }}"/> 
                    @error('name')
                        <div class="input-note error-message">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
            <div class="col-lg-4 col-md-8 col-sm-12">
                <div class="form-group">
                    <div class="input-group with-addon-icon-left">
                        <input type="text" class="form-control" id="menu-date" placeholder="Date" name="dates" value="{{ old('dates') }}"/> 
                        <span class="input-group-append">
                            <span class="input-group-text">
                                <i style="font-size: 20px" class="fa fa-calendar"></i> 
                            </span>
                        </span>
                    </div> 
                    @error('dates')
                        <div class="input-note error-message">{{ $message }}</div>
                    @enderror
                </div> 
            </div> 
        </div> 
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2">
                <div class="">
                    Filters:  <br /> 
                    @foreach($categories as $c)
                        <button type="button" class="btn btn-secondary btn-sm" id="{{ $c->id }}-filter">{{ $c->name }}</button>
                    @endforeach  
                    <button type="button" class="btn btn-white btn-sm" id="clear-filter">Clear</button>         
                </div> 
            </div>
        </div> 
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                <table id="selectFoodTable" class="mdl-data-table" cellspacing="0" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="th-sm">ID
                            </th>
                            <th class="th-sm">Image
                            <th class="th-sm">Food</th> 
                            <th class="th-sm">Category
                            </th> 
                            <th class="th-sm">Subcategory
                            </th> 
                            <th class="th-sm">Price
                            </th> 
                            <th class="th-sm" width="15%">Period
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($index->count() > 0)
                            @foreach($index as $food)
                                <tr>
                                    <td width="10%">{{ $food->id }}</td>
                                    <td><div class="food-table-image" style="background-image: url('{{ asset('storage/foodphotos/' . $food->coverphoto) }}');"></div></td>
                                    <td>{{ $food->name }}</td>
                                    <td>
                                        @if($food->categoriesFood->parent_id == null)
                                            {{ $food->categoriesFood->name }}
                                        @else
                                            {{ $food->categoriesFood->categoriesCategories->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($food->categoriesFood->parent_id == null)
                                            N/A
                                        @else 
                                            {{ $food->categoriesFood->name }}
                                        @endif
                                    </td>
                                    <td>₱{{ $food->price }}</td> 
                                    <td>
                                        <div class='choose-period'>
                                            @foreach($periods as $key=>$period)
                                                <div class='col-md-2'>
                                                    <div class='custom-control custom-checkbox'>
                                                        <input type="checkbox" name="period[{{ $period->id }}][{{ $food->id }}]" class="custom-control-input" id="{{ $food->id }}-{{ $period->id }}" value="{{ $food->id }}" 
                                                            @if(old('period.' . ($key +1)) != null)
                                                                @if(array_search($food->id, old('period.' . ($key +1))))    
                                                                    checked
                                                                @endif
                                                            @endif
                                                        >
                                                        <label class="custom-control-label" for="{{ $food->id }}-{{ $period->id }}">{{ $period->id }} {{ $period->period }}</label>
                                                    </div>
                                                </div> 
                                            @endforeach 
                                        </div> 
                                    </td>
                                </tr>
                            @endforeach 
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="th-sm">ID
                            </th>
                            <th class="th-sm">Image</th>
                            <th class="th-sm">Food</th> 
                            <th class="th-sm">Category
                            </th> 
                            <th class="th-sm">Subcategory
                            </th> 
                            <th class="th-sm">Price
                            </th> 
                            <th class="th-sm" width="15%">Period
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div> 
        </div> 
    </form> 
@endsection