<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duplicate Records</title>
  
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap JS (optional, for more features) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  
    <style>
        /* Optional additional styling */
        .dataTables_wrapper .dataTables_filter input {
            width: 250px;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4">Duplicate Records (Registeruser ID and Credit)</h1>

        <table id="duplicateTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Registeruser ID</th>
                    <th>Credit</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($duplicates)): ?>
                    <?php foreach ($duplicates as $duplicate): ?>
                        <tr>
                            <td><?php echo $duplicate->id; ?></td>
                            <td><?php echo $duplicate->registeruser_id; ?></td>
                            <td><?php echo $duplicate->credit; ?></td>
                            <td><?php echo $duplicate->wstatus; ?></td>
                            <td><?php echo $duplicate->wdate; ?></td>
                            <td><form action="<?php echo base_url('home/get_diplicate_idss');?>" method="post"><input type="hidden" name="id" value="<?php echo $duplicate->id; ?>"> <input type="submit" value="Delete" class="btn btn-danger"></form></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No duplicate records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            $('#duplicateTable').DataTable();
        });
    </script>
</body>
</html>
