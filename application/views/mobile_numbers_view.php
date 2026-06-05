<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Numbers</title>
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

    <h2>List of Mobile Numbers</h2>

    <table>
        <thead>
            <tr>
              
                <th>Mobile Number</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($mobiles)): ?>
                <?php foreach ($mobiles as $index => $mobile): ?>
                    <tr>
                      
                        <td><?php echo htmlspecialchars($mobile['mobile']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">No mobile numbers found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
