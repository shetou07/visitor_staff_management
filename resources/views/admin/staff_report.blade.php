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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
        
            <a class="navbar-brand" href="{{ url('/') }}">
                STAFF REPORT
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
    <div class="col-md-6">
        <br><br><br><br><br><h2>Staff</h2>
            <form method="POST" action="{{ route('admin.filter_staff') }}">
                @csrf
                <div class="form-group">
    <label for="start_date">Start Date</label>
    <input type="date" id="start_date" name="start_date" class="form-control">
</div>
<div class="form-group">
    <label for="end_date">End Date</label>
    <input type="date" id="end_date" name="end_date" class="form-control">
</div>
                <div class="form-group">
                    <label for="staff_id">Staff ID</label>
                    <input type="text" id="staff_id" name="staff_id" class="form-control">
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" id="department" name="department" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
            </form>
        </div>
    </body>
</html>