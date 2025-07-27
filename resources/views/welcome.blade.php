<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts (Optional, for modern font style) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .hero {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: #fff;
            text-align: center;
            padding: 100px 20px;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 30px;
        }

        .footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 15px 0;
            font-size: 0.95rem;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.4rem;
        }

        .btn-custom {
            padding: 10px 20px;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">StudentMgmt</a>
            
            
          <div class="ms-auto">
    @auth
        <a href="{{ url('/account/logout') }}" class="btn btn-outline-light me-2 btn-custom">Logout</a>
    @endauth

    @guest
        <a href="{{ url('/account/register') }}" class="btn btn-outline-light me-2 btn-custom">Register</a>
        <a href="{{ url('/account/login') }}" class="btn btn-light btn-custom">Login</a>
    @endguest
</div>

        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Welcome to Student Management System</h1>
            <p>Efficiently manage students, teachers, courses, enrollments, and grades — all in one place.</p>
           <button class="btn btn-light" onclick="alert('Please Login First')">Get Started</button>

        </div>
    </section>

    <!-- Footer -->
    <footer class="footer mt-auto">
        <div class="container">
            &copy; {{ date('Y') }} Student Management System. Built with ❤️ using Laravel & Bootstrap.
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
