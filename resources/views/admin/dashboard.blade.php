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
        .sidebar {
            height: 100vh;
            background-color: #044ea2;
            padding-top: 150px;
            width: 200px;
            font-size: 20px;
            text-align: left;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }
        .sidebar .nav-link {
            color: white;
        }
        .sidebar .nav-link.active {
            font-weight: bold;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
        .tile {
            background-color: #044ea2;
            color: white;
            padding: 70px;
            border-radius: 8px;
            text-align: center;
            
        }
        .tile h2 {
            margin: 0;
            font-size: 3em;
        }
        .tile p {
            margin: 0;
            font-size: 1.2em;
        }
        .ml-auto
        {
            margin-left: auto;
        }
    </style>
    
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="">
                ADMIN DASHBOARD
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            BK Boss,
                            <img src="{{ asset('avatar_male_man_people_person_profile_user_icon_123199.ico') }}" alt="Profile" style="height: 30px;">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link ajax-link" href="#" data-url="{{ route('admin.staffreport') }}">Staff Report</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ajax-link" href="#" data-url="{{ route('admin.visitorsreport') }}">Visitors Report</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ajax-link" href="#" data-url="{{ route('admin.checked_in_today') }}">Staff checked-in</a>
            </li>
            <!--li class="nav-item">
                <a class="nav-link ajax-link" href="#" data-url="{{ route('visitor.index') }}">Visitors checked-in</a>
            </li>-->
        </ul>
    </div>

    <div class="content" id="content-container">
        @yield('content')
        <div class="row">
        <div class="col-md-4">
            <div class="tile">
                <h2 id="visitors-count">{{ $visitorsCheckedIn }}</h2>
                <p>Visitors Checked In Today</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="tile">
                <h2 id="staff-count">{{ $staffCheckedIn }}</h2>
                <p>Staff Checked In Today</p>
            </div>
        </div>
         <div class="row">
        <div class="col-md-12">
            <canvas id="visitorChart"></canvas>
        </div>
    </div>
    </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.ajax-link').on('click', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        $('#content-container').html(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
        
    </script>
    
</body>
</html>
