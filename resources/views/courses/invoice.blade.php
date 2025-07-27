<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses Report - PrimeSoft Solutions</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #333;
            font-size: 13px;
            margin: 0 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            color: #2c3e50;
        }

        .subheading {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th, table td {
            border: 1px solid #aaa;
            padding: 8px 10px;
            text-align: left;
        }

        table thead {
            background-color: #2c3e50;
            color: #fff;
        }

        .footer {
            text-align: right;
            margin-top: 40px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>PrimeSoft Solutions</h1>
        <div class="subheading">Course Management System Report</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Credit Hours</th>
                <th>Teacher Name</th>
                <th>Teacher Phone</th>
                <th>Student Name</th>
                <th>Registration No</th>
            </tr>
        </thead>
        <tbody>
          
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->course_code }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->credit_hours }}</td>
                    <td>{{ $course->teacher->name ?? 'N/A' }}</td>
                    <td>{{ $course->teacher->phone ?? 'N/A' }}</td>
                    <td>{{ $course->student->name ?? 'N/A' }}</td>
                    <td>{{ $course->student->registration_no ?? 'N/A' }}</td>
                </tr>
          
        </tbody>
    </table>

    <div class="footer">
        Generated on {{ \Carbon\Carbon::now()->format('d M Y, h:i A') }}
    </div>

</body>
</html>
