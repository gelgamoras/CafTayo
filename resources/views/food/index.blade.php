<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
    <table id="foodTable" class="table table-striped table-bordered" cellspacing="0" max-width="100%">
        <thead>
            <tr>
                <th class="th-sm">ID
                </th>
                <th class="th-sm">Name
                </th>
                <th class="th-sm">Category ID
                </th>
                <th class="th-sm">Short Description
                </th>
                <th class="th-sm">Description
                </th>
                <th class="th-sm">Ingredients
                </th>
                <th class="th-sm">Calories
                </th>
                <th class="th-sm">Halal Food
                </th>
                <th class="th-sm">Price
                </th>
                <th class="th-sm">Campus ID
                </th>
                <th class="th-sm">Status
                </th>
            </tr>
        </thead>
        <tbody>
            @if($index->count() > 0)
                @foreach($index as $food)
                    <tr>
                        <td>{{ $food->id }}</td>
                        <td>{{ $food->name }}</td>
                        <td>{{ $food->category_id }}</td> 
                        <td>{{ $food->shortdescription }}</td>
                        <td>{{ $food->description }}</td>
                        <td>{{ $food->ingredients }}</td>
                        <td>{{ $food->calories }}</td>
                        <td>{{ $food->isHalal }}</td>
                        <td>{{ $food->price }}</td> 
                        <td>{{ $food->campus_id }}</td>
                        <td>{{ $food->isFeatured }}</td>  
                        <td>{{ $food->status }}</td>
                        <td>
                            <form method="POST" action="{{ route('food.destroy', ['campus' => request()->route('campus'), 'food' => $food->id]) }}">
                                @csrf
                                @method("delete")
                                <button type="submit" onclick="return confirm('Are you sure you want to {{ $food->status == 'Active' ? 'delete' : 'restore' }} this record?')">
                                    {{ $food->status == 'Active' ? 'Delete' : 'Restore' }}
                            </form>
                        </td>
                        <td class='text-center'>
                            <a href="{{ route('food.edit', ['campus' => request()->route('campus'), 'food' => $food->id]) }}">EDIT RECORD</a>
                        </td>         
                    </tr>
                @endforeach
            @endif
        </tbody>
        
    </table>
</div> 
</div>
<a href="{{ route('food.create', request()->route('campus')) }}">Add Food</a>