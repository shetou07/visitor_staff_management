<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BK Visitor & Staff Management System</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <style>
        .col-md-6 {
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
        .btn-primary
        {
            position: absolute;
            right: 32.2cm;
            top: 1.5cm;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Visitors Checked In</a>
            <div>
                <a href="{{ url('/welcome') }}" class="btn back-btn">Back</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="container col-lg-8 col-md-10 col-sm-12">
        <h1>Search Visitor by National ID</h1>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-group">
            
            <div class="input-group">
                <input type="text" class="form-control" id="searchNationalID" placeholder="Enter National ID Number">
                <div class="input-group-append">
                    <button id="searchButton" class="btn btn-primary" type="button">Search</button>
                </div><br><br>
            </div><br><br><br>
        </div>

        <div id="visitorTable"></div>
    </div>

    <script>
        $(document).ready(function() {
            function searchVisitors() {
                let nationalID = $('#searchNationalID').val();
                $.ajax({
                    url: "{{ route('visitor.index') }}",
                    type: 'GET',
                    data: { national_id: nationalID },
                    success: function(response) {
                        $('#visitorTable').html(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }

            $('#searchButton').on('click', function() {
                searchVisitors();
            });

            $('#searchNationalID').on('keyup', function(e) {
                if (e.keyCode === 13) {
                    searchVisitors();
                }
            });
        });
    </script>
</body>
</html>
