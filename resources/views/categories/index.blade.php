<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
    <table id="foodTable" class="table table-striped table-bordered" cellspacing="0" max-width="100%">
        <thead>
            <tr>
                <th class="th-sm">ID
                </th>
                <th class="th-sm">Category Name
                </th>
                <th class="th-sm">Campus
                </th>
                <th class="th-sm">Status
                </th>
            </tr>
        </thead>
        <tbody>
            @if($index->count() > 0)
                @foreach($index as $categories)
                    <tr>
                        <td>{{ $categories->id }}</td>
                        <td>{{ $categories->name }}</td>
                        <td>{{ $categories->campus_id }}</td>    
                        <td>{{ $categories->status }}</td>
                        <td>
                            <form method="POST" action="{{ route('categories.destroy', $categories->id) }}">
                                @csrf
                                @method("delete")
                                <input type="submit" value="Delete Record"/>
                            </form>
                        </td>
                        <td class='text-center'>
                            <a href="{{ route('categories.edit', $categories->id) }}">EDIT RECORD</a>
                        </td>         
                    </tr>
                @endforeach
            @endif
        </tbody>
        
    </table>
</div> 
</div>
<a href="{{ route('categories.create', $categories->id) }}">Add Categories</a>