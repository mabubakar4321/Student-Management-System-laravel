<!DOCTYPE html>
<html>
<head>
    <title>Enrollment Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 13px;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar .logo {
            font-weight: bold;
            font-size: 14px;
        }

        .invoice-title {
            font-size: 38px;
            font-weight: bold;
            margin: 30px 0 10px;
        }

        .date {
            font-size: 13px;
        }

        .section {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
            line-height: 1.5;
        }

        .section h4 {
            font-size: 14px;
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        thead {
            background-color: #eee;
            font-weight: bold;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .total {
            text-align: right;
            font-weight: bold;
            padding: 10px 0;
        }

        .bottom-section {
            margin-top: 30px;
            line-height: 1.6;
        }

        .note {
            margin-top: 10px;
        }

        .footer-curve {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .footer-curve img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

    <div class="top-bar">
        <div class="logo">
            PrimeSoft Solutions
        </div>
        <div class="invoice-no">
            NO. {{ str_pad($enroll->id, 6, '0', STR_PAD_LEFT) }}
        </div>
    </div>

    <div class="invoice-title">ENROLLMENT</div>

    <div class="date">Date: {{ \Carbon\Carbon::now()->format('d F, Y') }}</div>

    <div class="section">
        <div>
            <h4>Student Info:</h4>
            {{ $enroll->student->name }}<br>
            {{ $enroll->student->registration_no ?? 'N/A' }}<br>
            {{ $enroll->student->phone ?? 'N/A' }}<br>
            {{ $enroll->student->email ?? '' }}
        </div>

        <div>
            <h4>Course Info:</h4>
            {{ $enroll->course->name }}<br>
            Code: {{ $enroll->course->course_code }}<br>
            Credit Hours: {{ $enroll->course->credit_hours }}<br>
            Enrolled: {{ \Carbon\Carbon::parse($enroll->enrollment_date)->format('d M Y') }}
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Credit Hours</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $enroll->course->name }}</td>
                <td>1</td>
                <td>{{ $enroll->course->credit_hours }}</td>
                <td>{{ $enroll->course->credit_hours }}</td>
            </tr>
        </tbody>
    </table>

    <div class="total">Total Credit Hours: {{ $enroll->course->credit_hours }}</div>

    <div class="bottom-section">
        <div><strong>Payment method:</strong> Paid</div>
        <div class="note"><strong>Note:</strong> Thank you for enrolling with PrimeSoft Solutions!</div>
    </div>

    {{-- Optional footer curve --}}
    <div class="footer-curve">
        <img src="{{ public_path('footer-wave.png') }}" alt="Footer Curve">
    </div>

</body>
</html>
