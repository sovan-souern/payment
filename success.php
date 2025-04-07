<!-- success.php -->
<?php
include('connection.php');

$tran_id = isset($_GET['tran_id']) ? $_GET['tran_id'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Successful</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h2>Payment Successful</h2>
        <p>Thank you for your purchase!</p>
        <p>Transaction ID: <?php echo htmlspecialchars($tran_id); ?></p>
        <a href="products.php" class="btn btn-primary">Back to Products</a>
    </div>
</body>
</html>