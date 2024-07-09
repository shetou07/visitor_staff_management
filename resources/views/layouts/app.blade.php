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
    <style>
        .admin-login-btn {
            background-color: #044ea2;
            color: white;
            position: absolute;
            right: 5cm;
            
        }
        .sec-logout-btn {
            background-color: #044ea2;
            color: white;
            position: absolute;
            right: 1cm;
        }
        .ml-auto
        {
            margin-left: auto;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('images/bk_logoo1.png') }}" alt="bk logo">
    </a>
    
    @auth('security')
    <div class="ml-auto">
        <form method="POST" action="{{ route('security.logout') }}">
            @csrf
            <button type="submit" class="btn sec-logout-btn">Security Logout</button>
        </form>
    </div>
    @endauth
</nav>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            BK Visitor and Staff Management System
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('visitor.create') }}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('visitor.index') }}">Visitors</a><br>
                </li><br><br><br>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.check-in') }}">Staff registration</a><br>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.check-out') }}">Staff checkout</a><br>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.checked-in-today') }}">Staff checked-in</a><br>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>