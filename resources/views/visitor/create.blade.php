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
                Visitors Registration
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
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card">
                    <div class="card-header">BK Visitor Registration</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('visitor.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="vehicle">National ID number</label>
                                <input id="vehicle" type="number" class="form-control @error('vehicle') is-invalid @enderror" name="vehicle" value="{{ old('vehicle') }}" required >
                                @error('vehicle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="purpose">Purpose of Visit</label>
                                <select id="purpose" class="form-control @error('purpose') is-invalid @enderror" name="purpose" required>
                                    <option value="" disabled selected>Select purpose</option>
                                    <option value="Account support" {{ old('purpose') == 'Account support' ? 'selected' : '' }}>Account support</option>
                                    <option value="Inquiries" {{ old('purpose') == 'Inquiries' ? 'selected' : '' }}>Inquiries</option>
                                    <option value="Study tour" {{ old('purpose') == 'Study tour' ? 'selected' : '' }}>Study tour</option>
                                    <option value="Loan requests" {{ old('purpose') == 'Loan requests' ? 'selected' : '' }}>Loan requests</option>
                                </select>
                                @error('purpose')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
