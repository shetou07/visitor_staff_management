<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BK Visitor & Staff Management System</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">-->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">-->
    <style>
        .col-md-6{
            position: absolute;
            left: 14cm;
        }
            .back-btn {
            background-color: white;
            color: #044ea2;
            position: absolute;
            right: 1cm;
            top: 0.7cm;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
        
            <a class="navbar-brand" href="{{ url('/') }}">
                Staff Checked In
            </a>
            <div>
                <a href="{{ url('/welcome') }}" class="btn back-btn">Back</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    
        </div>
    </nav>
    <div class="container">
        @if(session('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif
        <table class="table">
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
    </div>
</body>
</html>
