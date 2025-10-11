<?php
include('db/connect.php');
session_start();

// Example: Assume user_id is stored in session after login
$user_id = $_SESSION['user_id'] ?? 1; // Temporary: replace with real session logic

$query = "
SELECT 
  b.id AS booking_id,
  l.title,
  l.departs_from,
  l.arrives_at,
  l.airline,
  l.flight_number,
  l.flight_date,
  l.price,
  l.remaining_weight
FROM bookings b
JOIN listings l ON b.listing_id = l.id
WHERE b.user_id = '$user_id'
ORDER BY b.id DESC
";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Your Bookings | ExcessAir</title>
  <link rel='stylesheet' href='assets/css/style.css'>
</head>
<body>

<header>
  <div onclick="window.location='dashboard.php';" style="display:flex;align-items:center;cursor:pointer;">
      <img src="assets/images/logo.png" alt="ExcessAir Logo">
      <h1>ExcessAir</h1>
  </div>
  <div>
      <a href='dashboard.php'>Dashboard</a>
      <a href='listing.php'>Add Listing</a>
      <a href='view_listing.php'>Browse Services</a>
      <a href='bookings.php'>My Bookings</a>
      <a href='logout.php'>Logout</a>
  </div>
</header>

<section class="section">
  <h2 style="color:#002B5B;">Your Bookings</h2>

  <div class="cards">
  <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='card'>
                <h3>{$row['departs_from']} → {$row['arrives_at']}</h3>
                <p><strong>Airline:</strong> {$row['airline']} ({$row['flight_number']})</p>
                <p><strong>Date:</strong> {$row['flight_date']}</p>
                <p><strong>Price:</strong> ₹{$row['price']}</p>
                <p><strong>Remaining Weight:</strong> {$row['remaining_weight']} kg</p>
                <button class='primary' disabled>Booked</button>
            </div>";
        }
    } else {
        echo "<p>You haven’t made any bookings yet.</p>";
    }
  ?>
  </div>
</section>

<footer>
  <p>&copy; <?php echo date('Y'); ?> ExcessAir. All Rights Reserved.</p>
</footer>

</body>
</html>
