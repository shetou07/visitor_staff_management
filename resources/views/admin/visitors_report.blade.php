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
<div class="col-md-6">
            
        <br><br><br><br><h2>Visitors</h2>
            <form method="POST" action="{{ route('admin.filter_visitors') }}">
                @csrf
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" class="form-control">
                </div>
                <div class="form-group">
                   <label for="end_date">End Date</label>
                   <input type="date" id="end_date" name="end_date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="purpose">Purpose of Visit</label>
                    <select id="purpose" name="purpose" class="form-control">
                        <option value="">Select purpose</option>
                        <option value="Account support">Account support</option>
                        <option value="Inquiries">Inquiries</option>
                        <option value="Study tour">Study tour</option>
                        <option value="Loan requests">Loan requests</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
            </form>
        </div>
    </body>   
</html>