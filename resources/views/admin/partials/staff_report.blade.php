<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($staff as $member)
        <tr>
            <td>{{ $member->name }}</td>
            <td>{{ $member->department }}</td>
            <td>{{ $member->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
