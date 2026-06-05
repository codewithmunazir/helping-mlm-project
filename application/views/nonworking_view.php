<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nonworking Records</title>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

    <h1>Nonworking Records with Withdrawal Request Cancel</h1>

    <!-- Check if records are available -->
    <?php if (isset($records) && !empty($records)): ?>
        <table id="recordsTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Register User ID</th>
                    <th>Credit</th>
                    <th>Status</th>
                    <!-- Add other fields as needed -->
                    <th>Other Field 1</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                    <tr>
                        <td><?php echo $record->id; ?></td>
                        <td><?php echo $record->registeruser_id; ?></td>
                        <td><?php echo $record->credit; ?></td>
                        <td><?php echo $record->wstatus; ?></td>
                        <td><?php echo $record->wdate; ?></td>
                        <!-- Add other fields as needed -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>

    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <script>
        // Initialize DataTable
        $(document).ready(function() {
            $('#recordsTable').DataTable();
        });
    </script>

</body>
</html>
