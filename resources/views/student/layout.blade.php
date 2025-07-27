<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS CDN (you can also use local) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for layout -->
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .main-wrapper {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            min-height: 100vh;
        }

        .sidebar a {
            color: white;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        footer {
            background: #f8f9fa;
            padding: 10px;
            text-align: center;
        }

        .navbar {
            margin-bottom: 0;
        }
    </style>
</head>
<body>

    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student Management</a>
            <div class="d-flex ms-auto">
                <a class="btn btn-outline-light" href="{{ url('/account/logout') }}">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <h4 class="text-center py-3">Dashboard</h4>
            <a href="{{ url('account/studentss') }}">Students</a>
            <a href="{{ route('teacherstore')}}">Teachers</a>
            <a href="{{ url('courses/store') }}">Courses</a>
            <a href="{{ url('/enroll/addstudent') }}">Enrollments</a>
            {{-- <a href="{{ url('/grades') }}">Grades</a> --}}
        </div>

        <!-- Dynamic Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Student Management System</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
