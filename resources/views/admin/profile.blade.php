<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .profile-picture {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-bottom: 20px;
        }
        .profile-details {
            text-align: center;
        }
        .profile-details h2 {
            margin: 0;
            font-size: 2em;
        }
        .profile-details p {
            margin: 5px 0;
            font-size: 1.2em;
        }
        .btn
        {
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
                ADMIN DASHBOARD
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
            </div>
        </div>
    </nav>

    <div class="container profile-container">
        <img src="{{ asset('images/admin_avatar.png') }}" alt="Profile Picture" class="profile-picture">
        <div class="profile-details">
            <h2>{{ $admin->name }}</h2>
            <p>{{ $admin->email }}</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
