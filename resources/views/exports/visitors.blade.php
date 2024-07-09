<!DOCTYPE html>
<html>
<head>
    <title>Visitors Report</title>
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
    <h1>Visitors Report</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>National ID</th>
                <th>Purpose of Visit</th>
                <th>Date</th>
                <th>Checked in by</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $visitor)
                <tr>
                    <td>{{ $visitor->name }}</td>
                    <td>{{ $visitor->email }}</td>
                    <td>{{ $visitor->phone }}</td>
                    <td>{{ $visitor->vehicle }}</td>
                    <td>{{ $visitor->purpose }}</td>
                    <td>{{ $visitor->created_at->toDateString() }}</td>
                    <td>{{ $visitor->checked_in_by }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
