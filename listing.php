<?php
// listing.php
session_start();
include('db/connect.php');

// Set user_id for foreign key (replace with actual user ID from your users table)
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1; // Replace 1 with your actual user ID
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Listing | ExcessAir</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
  <div onclick="window.location='dashboard.php';" style="display:flex;align-items:center;cursor:pointer;">
      <img src="excessair.jpg" alt="ExcessAir Logo" style="height:50px;margin-right:10px;">
      <h1>ExcessAir</h1>
  </div>
  <div>
      <a href="dashboard.php">Dashboard</a>
      <a href="listing.php">Add Listing</a>
      <a href="view_listing.php">Browse Services</a>
      <a href="bookings.php">My Bookings</a>
      <a href="logout.php">Logout</a>
  </div>
</header>

<section class="section">
  <h2 style="color:#002B5B;">Add Your Flight Listing</h2>
  <p>Share your flight details or offer luggage space for others.</p>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $user_id = $_SESSION['user_id'];
      $type = $_POST['type'];
      $departs_from = $_POST['departs_from'];
      $arrives_at = $_POST['arrives_at'];
      $airline = $_POST['airline'];
      $flight_number = $_POST['flight_number'];
      $flight_date = $_POST['flight_date'];
      $price = $_POST['price'];
      $remaining_weight = $_POST['remaining_weight'];
      $description = $_POST['description'];

      // INSERT query including user_id
      $query = "INSERT INTO listings (user_id, type, title, departs_from, arrives_at, airline, flight_number, flight_date, price, description, remaining_weight)
                VALUES ('$user_id', '$type', '$type', '$departs_from', '$arrives_at', '$airline', '$flight_number', '$flight_date', '$price', '$description', '$remaining_weight')";

      if (mysqli_query($conn, $query)) {
          echo "<p style='color:green;font-weight:bold;'>Listing added successfully!</p>";
      } else {
          echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
      }
  }
  ?>

  <form method="POST">
      <label>Listing Type</label>
      <select name="type" required>
          <option value="Sell Luggage">Sell Luggage</option>
          <option value="Offer Companion">Offer Companion</option>
      </select>

      <label>Departs From</label>
      <input type="text" name="departs_from" placeholder="Departure City" required>

      <label>Arrives At</label>
      <input type="text" name="arrives_at" placeholder="Arrival City" required>

      <label>Airline</label>
      <input type="text" name="airline" placeholder="Airline Name" required>

      <label>Flight Number</label>
      <input type="text" name="flight_number" placeholder="Flight Number (e.g., AI203)" required>

      <label>Flight Date</label>
      <input type="date" name="flight_date" required>

      <label>Expected Price (₹)</label>
      <input type="number" name="price" placeholder="Enter price" required>

      <label>Remaining Weight (kg)</label>
      <input type="number" name="remaining_weight" placeholder="Enter remaining luggage weight" required>

      <label>Additional Details</label>
      <textarea name="description" rows="4" placeholder="Any other details..."></textarea>

      <button type="submit">Add Listing</button>
  </form>
</section>

<footer>
  <p>&copy; <?php echo date('Y'); ?> ExcessAir. All Rights Reserved.</p>
</footer>

</body>
</html>
