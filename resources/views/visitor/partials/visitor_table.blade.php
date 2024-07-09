@if($visitors->isEmpty())
    <p>No visitors found with the given National ID number.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>National ID Number</th>
                <th>Purpose</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitors as $visitor)
                <tr>
                    <td>{{ $visitor->name }}</td>
                    <td>{{ $visitor->email }}</td>
                    <td>{{ $visitor->phone }}</td>
                    <td>{{ $visitor->vehicle }}</td>
                    <td>{{ $visitor->purpose }}</td>
                    <td>{{ $visitor->checkin_status ? "Checked in" : "Checked out" }}</td>
                    <td>
                        <form action="{{ route('visitor.checkout', $visitor->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" {{ $visitor->checkin_status ? '' : 'disabled' }}>Check Out</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
