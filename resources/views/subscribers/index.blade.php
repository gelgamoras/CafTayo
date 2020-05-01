<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
    <table id="foodTable" class="table table-striped table-bordered" cellspacing="0" max-width="100%">
        <thead>
            <tr>
                <th class="th-sm">ID
                </th>
                <th class="th-sm">Email
                </th>
                <th class="th-sm">Hash
                </th>
                <th class="th-sm">Status
                </th>
            </tr>
        </thead>
        <tbody>
            @if($index->count() > 0)
                @foreach($index as $subscribers)
                    <tr>
                        <td>{{ $subscribers->id }}</td>
                        <td>{{ $subscribers->email }}</td>
                        <td>{{ $subscribers->hash }}</td>
                        <td>{{ $subscribers->status }}</td> 
                    </tr>
                @endforeach
            @endif
        </tbody>
        
    </table>
</div> 
</div>
<a href="{{ route('subscribers.create', $subscribers->id) }}">Add Subscriber</a>