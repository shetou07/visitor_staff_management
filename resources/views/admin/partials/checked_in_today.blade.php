<table class="table table-striped">
    <thead>
        <tr>
            <th>Staff ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Check In Time</th>
            <th>Check Out Time</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($checkedInToday as $entry)
        <tr>
            <td>{{ $entry->staff->staff_id }}</td>
            <td>{{ $entry->staff->name }}</td>
            <td>{{ $entry->staff->department }}</td>
            <td>{{ $entry->check_in_time }}</td>
            <td>{{ $entry->check_out_time ?? 'N/A' }}</td>
            <td>{{ $entry->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
