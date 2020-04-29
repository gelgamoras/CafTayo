@extends('layouts.dashboard.main')

@section('page_header', 'Categories')
@section('subheader', '')

@section('page_top_buttons')
   <base href="{{Request::url()}}/" /> 
   <button type="button" class="btn btn-sm btn-primary mr-1"  onclick="window.location.href='create'">
        + Add Category
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
        var table = $('#categoryTable').DataTable({
            columnDefs: [
                {
                    targets: [0, 1, 2, 3, 4],   
                    className: 'text-left'
                }
            ]
        });    
    });
</script> 
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 mt-2">
            <table id="categoryTable" class="mdl-data-table" cellspacing="0" style="width: 100%">
                <thead>
                    <tr>
                        <th class="th-sm">ID
                        </th>
                        <th class="th-sm">Category
                        <th class="th-sm">Parent Category</th> 
                        </th>
                        <th class="th-sm">Status
                        </th> 
                        <th class="th-sm" width="30%">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($index->count() > 0)
                        @foreach($index as $category)
                            <tr>
                                <td width="10%">{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>@if($category->parent_id != null) {{ $category->s_categoriesCategories->name }} @endif</td>
                                <td>{{ $category->status }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', ['campus' => request()->route('campus'), 'category' => $category->id]) }}" class="btn btn-sm btn-secondary">
                                        <i class='fas fa-edit'></i>
                                    </a> 
                                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('category-delete-{{ $category->id }}').submit(); }" class='btn btn-sm btn-primary'>
                                        @if($category->status == 'Active')
                                            <i class="fas fa-trash"></i> 
                                        @else 
                                            Restore
                                        @endif
                                    </a>
                                    <form id="category-delete-{{ $category->id }}" method="POST" action="{{ route('categories.destroy', ['campus' => request()->route('campus'), 'category' => $category->id]) }}">
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
                        <th class="th-sm">Category
                        <th class="th-sm">Parent Category</th> 
                        </th>
                        <th class="th-sm">Status
                        </th> 
                        <th class="th-sm" width="30%">Action
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div> 
    </div> 
@endsection