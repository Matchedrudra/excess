<?php
include('db/connect.php');

$listing_id = $_GET['id'] ?? 0;
$buyer_id = 1; // replace later with session user id

// Get listing details
$query = "SELECT * FROM listings WHERE id = '$listing_id'";
$result = mysqli_query($conn, $query);
$listing = mysqli_fetch_assoc($result);

if (!$listing) {
  echo "<h2>Listing not found!</h2>";
  exit;
}

$seller_id = $listing['user_id'];
$amount = $listing['price'];

if (isset($_POST['confirm_payment'])) {
    $insert = "INSERT INTO payments (buyer_id, seller_id, listing_id, amount, status)
               VALUES ('$buyer_id', '$seller_id', '$listing_id', '$amount', 'held')";
    if (mysqli_query($conn, $insert)) {
        header("Location: invoice.php?id=" . mysqli_insert_id($conn));
        exit;
    } else {
        echo "<p style='color:red;'>Error processing payment.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment Confirmation | ExcessAir</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body { font-family: 'Poppins', sans-serif; margin:0; background:#f5f8ff; }
    header { display:flex; justify-content:space-between; align-items:center; padding:15px 50px; background:#0B3D91; color:white; }
    header h1 { margin:0; color:#FFD700; }
    header img { width:50px; height:50px; margin-right:10px; object-fit:contain; }
    .container { max-width:800px; margin:50px auto; background:white; padding:30px; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,0.1); }
    h2 { color:#0B3D91; }
    .details { margin-top:20px; line-height:1.6; }
    .btn { background:#FFD700; color:#0B3D91; padding:12px 30px; border:none; font-weight:600; border-radius:5px; cursor:pointer; }
    .btn:hover { opacity:0.8; }
  </style>
</head>
<body>

<header>
  <div onclick="window.location='dashboard.php';" style="display:flex;align-items:center;cursor:pointer;">
    <img src="assets/images/logo.png" alt="logo"><h1>ExcessAir</h1>
  </div>
  <div>
    <a href="dashboard.php" style="color:white;">Dashboard</a>
    <a href="view_listing.php" style="color:white; margin-left:20px;">Browse</a>
  </div>
</header>

<div class="container">
  <h2>Confirm Your Booking</h2>
  <p>Review your listing details before confirming payment.</p>

  <div class="details">
    <p><strong>Type:</strong> <?= ucfirst($listing['type']); ?></p>
    <p><strong>Description:</strong> <?= htmlspecialchars($listing['description']); ?></p>
    <p><strong>Airline:</strong> <?= htmlspecialchars($listing['airline']); ?></p>
    <p><strong>Flight Number:</strong> <?= htmlspecialchars($listing['flight_number']); ?></p>
    <p><strong>Departure:</strong> <?= htmlspecialchars($listing['departure_city']); ?> → <?= htmlspecialchars($listing['arrival_city']); ?></p>
    <p><strong>Departure Date:</strong> <?= htmlspecialchars($listing['departure_date']); ?></p>
    <p><strong>Amount:</strong> ₹<?= number_format($listing['price'], 2); ?></p>
  </div>

  <form method="POST">
    <button type="submit" name="confirm_payment" class="btn">Proceed to Secure Payment</button>
  </form>
</div>

</body>
</html>
