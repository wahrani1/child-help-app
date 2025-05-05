<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Child Emergency Reporting System - Help children in need quickly and privately">
    <title>{{ config('app.name', 'Child Help') }} - @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        .hero-section {
            background-color: #f8f9fa;
            padding: 4rem 0;
        }

        .report-btn {
            padding: 15px 30px;
            font-size: 1.2rem;
            border-radius: 30px;
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 2rem 0;
            margin-top: 3rem;
        }

        .privacy-note {
            background-color: #e9f7fe;
            border-left: 4px solid #3498db;
            padding: 1rem;
            margin: 1rem 0;
        }
    </style>

    @yield('styles')
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Child Help</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About
                        Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                       href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white ms-2" href="{{ route('report.create') }}">Report a
                        Child</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main>
    @yield('content')
</main>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Child Help</h5>
                <p>Helping children in emergency situations find safety quickly.</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-white">Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-white">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="text-white">Contact</a></li>
                    <li><a href="{{ route('report.create') }}" class="text-white">Report a Child</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Emergency Contacts</h5>
                <p>Emergency: 911</p>
                <p>Child Help Hotline: 1-800-4-A-CHILD</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <p>&copy; {{ date('Y') }} Child Help. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@yield('scripts')
</body>
</html>
