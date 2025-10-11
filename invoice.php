<?php
include('db/connect.php');
$payment_id = $_GET['id'] ?? 0;

$query = "SELECT p.*, l.title, l.airline, l.flight_number, l.departure_city, l.arrival_city, l.departure_date 
          FROM payments p 
          JOIN listings l ON p.listing_id = l.id 
          WHERE p.id = '$payment_id'";
$result = mysqli_query($conn, $query);
$payment = mysqli_fetch_assoc($result);

if (!$payment) {
    echo "<h3>Invalid Payment ID</h3>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice | ExcessAir</title>
  <style>
    body { font-family: 'Poppins', sans-serif; background:#f5f8ff; margin:0; padding:40px; }
    .invoice-box { max-width:700px; margin:auto; background:white; padding:30px; border-radius:12px; box-shadow:0 4px 20px rgba(0,0,0,0.1); }
    h1 { color:#0B3D91; margin-bottom:20px; }
    .details { line-height:1.8; }
    .details strong { color:#0B3D91; }
    .footer { margin-top:30px; font-size:13px; text-align:center; color:#555; }
    .btn { background:#FFD700; color:#0B3D91; padding:10px 20px; text-decoration:none; border-radius:5px; font-weight:600; }
  </style>
</head>
<body>

<div class="invoice-box">
  <h1>ExcessAir Secure Payment Receipt</h1>
  <div class="details">
    <p><strong>Transaction ID:</strong> #<?= $payment['id']; ?></p>
    <p><strong>Listing:</strong> <?= htmlspecialchars($payment['title']); ?></p>
    <p><strong>Flight:</strong> <?= htmlspecialchars($payment['airline']); ?> (<?= htmlspecialchars($payment['flight_number']); ?>)</p>
    <p><strong>Route:</strong> <?= htmlspecialchars($payment['departure_city']); ?> → <?= htmlspecialchars($payment['arrival_city']); ?></p>
    <p><strong>Departure Date:</strong> <?= htmlspecialchars($payment['departure_date']); ?></p>
    <p><strong>Amount Paid:</strong> ₹<?= number_format($payment['amount'], 2); ?></p>
    <p><strong>Status:</strong> <?= strtoupper($payment['status']); ?> (Funds held securely by ExcessAir)</p>
    <p><strong>Payment Date:</strong> <?= $payment['payment_date']; ?></p>
  </div>

  <p class="footer">
    Thank you for using <strong>ExcessAir</strong>.<br>
    Payment will be released to the provider after flight verification.
  </p>

  <div style="text-align:center; margin-top:20px;">
    <a href="dashboard.php" class="btn">Return to Dashboard</a>
  </div>
</div>

</body>
</html>
