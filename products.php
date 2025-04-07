<?php 
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Courses</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
<div class="row">

<?php 
$sql = "SELECT * FROM courses";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_array($result)) {
        $transaction_id = uniqid('tran_');
        // Construct the payment URL with query parameters
        $payment_url = "https://pay.ababank.com/efRPcMcXvMLRihKq6?" . http_build_query([
            'tran_id' => $transaction_id,
            'amount' => $data['price'],
            'items' => $data['name'],
            'return_url' => "http://localhost/php-practical-work/payment-gateway/aba/success.php?tran_id=$transaction_id",
            'cancel_url' => "http://localhost/php-practical-work/payment-gateway/aba/cancel.php?tran_id=$transaction_id"
        ]);
        ?>
        <div class="col-xl-4">
            <div class="card" style="width:400px">
                <img class="card-img-top" src="uploads/<?php echo htmlspecialchars($data['image']); ?>" alt="<?php echo htmlspecialchars($data['name']); ?>" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title"><?php echo htmlspecialchars($data['name']); ?></h4>
                    <p class="card-text">$<?php echo number_format($data['price'], 2); ?></p>
                    <a href="<?php echo $payment_url; ?>" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
        </div>
    <?php }
} else {
    echo '<p>No courses found.</p>';
}
?>

</div> 
</div>

</body>
</html>