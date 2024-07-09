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
    
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
        
            <a class="navbar-brand" href="{{ url('/') }}">
                VISITOR REPORT
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

       
    </div>


        </div>
    </nav>
<div class="container">
    <h1>Visitors</h1>
    @if($visitors->isEmpty())
        <p>No visitors found.</p>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>National ID</th>
                    <th>Purpose of Visit</th>
                    <th>Date</th>
                    <th>Checkout time</th>
                    <th>Checked in by</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($visitors as $visitor)
                    <tr>
                        <td>{{ $visitor->name }}</td>
                        <td>{{ $visitor->email }}</td>
                        <td>{{ $visitor->phone }}</td>
                        <td>{{ $visitor->vehicle }}</td>
                        <td>{{ $visitor->purpose }}</td>
                        <td>{{ $visitor->created_at }}</td>
                        <td>{{ $visitor->updated_at }}</td>
                        <td>{{ $visitor->checked_in_by }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.export_visitors', ['date' => request('date'), 'purpose' => request('purpose')]) }}" class="btn btn-secondary">Export to PDF</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
    @endif
</div>
</body>
</html>
