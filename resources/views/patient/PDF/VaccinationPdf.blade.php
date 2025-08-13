<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vaccination Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #fff;
            font-size: 14px;
        }

        .header {
            text-align: center;
            padding: 10px 0;
            border-bottom: 3px solid #0d6efd;
        }

        .header img {
            height: 60px;
            margin-bottom: 5px;
        }

        .header h1 {
            margin: 0;
            color: #0d6efd;
            font-size: 24px;
            font-weight: bold;
        }

        .report-title {
            background-color: #0d6efd;
            color: white;
            padding: 8px;
            text-align: center;
            font-size: 18px;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }

        th, td {
            border: 1px solid #bbb;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: center;
            color: #666;
        }

        .signature {
            margin-top: 40px;
            text-align: right;
            font-weight: bold;
        }

        .status-positive {
            color: red;
            font-weight: bold;
        }

        .status-negative {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <img src="{{ public_path('images/SIUT.jpeg') }}" alt="Hospital Logo">
        <h1>{{ $vaccineReport->hospital_name }}</h1>
        <p>{{$vaccineReport->hospital_address}}</p>
       
        
    </div>

    <!-- Report Title -->
    <div class="report-title">
        Vaccination Test Report
    </div>

    <!-- Patient Information -->
    <table>
        <tr>
            <th>Patient Name</th>
            <td>{{ $vaccineReport->patient_name }}</td>
            <th>Patient ID</th>
            <td>{{ $vaccineReport->patient_id ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Appointment Date</th>
            <td>{{ $vaccineReport->appointment_date }}</td>
            <th>Report Date</th>
            <td>{{ $vaccineReport->vaccination_result_date }}</td>
        </tr>
    </table>

    <!-- Test Details -->
    <table>
        <tr>
            <th>Vaccine Name</th>
            <td>{{ $vaccineReport->vaccination_name }}</td>
        </tr>
        <tr>
            <th>Dose Number</th>
            <td>{{ $vaccineReport->dose_number }}</td>
        </tr>
        <tr>
            <th>Result</th>
            <td class="{{ strtolower($vaccineReport->vaccination_result) === 'positive' ? 'status-positive' : 'status-negative' }}">
                {{ $vaccineReport->vaccination_result }}
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $vaccineReport->status }}</td>
        </tr>
    </table>

    <!-- Signature -->
    <div class="signature">
        ___________________________<br>
        Doctor's Signature
    </div>

    <!-- Footer -->
    <div class="footer">
        This is a computer-generated report. No signature required if sent digitally.
    </div>

</body>
</html>
