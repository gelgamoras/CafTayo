<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
    <table id="foodTable" class="table table-striped table-bordered" cellspacing="0" max-width="100%">
        <thead>
            <tr>
                <th class="th-sm">ID
                </th>
                <th class="th-sm">Campus
                </th>
                <th class="th-sm">Address
                </th>
                <th class="th-sm">Status
                </th>
            </tr>
        </thead>
        <tbody>
            @if($index->count() > 0)
                @foreach($index as $campus)
                    <tr>
                        <td>{{ $campus->id }}</td>
                        <td>{{ $campus->name }}</td>
                        <td>{{ $campus->address }}</td>      
                        <td>{{ $campus->status }}</td>
                        <td>
                            <form method="POST" action="{{ route('campus.destroy', $campus->id) }}">
                                @csrf
                                @method("delete")
                                <input type="submit" value="Delete Record"/>
                            </form>
                        </td>
                        <td class='text-center'>
                            <a href="{{ route('campus.edit', $campus->id) }}">EDIT RECORD</a>
                        </td>         
                    </tr>
                @endforeach
            @endif
        </tbody>
        
    </table>
</div> 
</div>
<a href="{{ route('campus.create', $campus->id) }}">Add Campus</a>