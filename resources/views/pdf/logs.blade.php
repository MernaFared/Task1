 <!DOCTYPE html>
<html>
<head>
    <title>Logs</title>
    <style>
        /* Define your PDF styles here */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Logs</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Log Name</th>
                <th>Description</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->log_name }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->created_at }}</td>
                    <!-- Add more columns if needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

