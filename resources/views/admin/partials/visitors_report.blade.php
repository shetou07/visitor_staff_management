<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Purpose</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($visitors as $visitor)
        <tr>
            <td>{{ $visitor->name }}</td>
            <td>{{ $visitor->email }}</td>
            <td>{{ $visitor->phone }}</td>
            <td>{{ $visitor->purpose }}</td>
            <td>{{ $visitor->created_at->toDateString() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
