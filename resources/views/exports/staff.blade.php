<!-- resources/views/exports/staff.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Staff Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Staff Report</h1>
    @if($checkIns->isEmpty())
        <p>No data available for the selected staff.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Check-In Time</th>
                    <th>Check-Out Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($checkIns as $checkIn)
                    <tr>
                        <td>{{ $checkIn->staff->staff_id }}</td>
                        <td>{{ $checkIn->staff->name }}</td>
                        <td>{{ $checkIn->staff->department }}</td>
                        <td>{{ $checkIn->check_in_time }}</td>
                        <td>{{ $checkIn->check_out_time }}</td>
                        <td>{{ $checkIn->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
