<?php include('db/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Browse Services | ExcessAir</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 24px;
      background: linear-gradient(90deg,#0B3D91,#002060);
      color: #fff;
    }
    header h1 {
      margin: 0;
      font-size: 24px;
      font-weight: bold;
      color: #FFD700;
    }
    header img {
      height: 50px;
      width: 50px;
      border-radius: 8px;
      margin-right: 10px;
      object-fit: cover;
      border: 2px solid #FFD700;
    }
    header div {
      display: flex;
      align-items: center;
    }
    header a {
      color: #fff;
      text-decoration: none;
      margin-left: 18px;
      font-weight: 600;
    }
    header a:hover {
      color: #FFD700;
    }
  </style>
</head>
<body>

<header>
  <div onclick="window.location='dashboard.php';" style="display:flex;align-items:center;cursor:pointer;">
      <img src="assets/images/excessair.jpg" alt="ExcessAir Logo" onerror="this.src='excessair.jpg';">
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
  <h2 style="color:#002B5B;">Available Listings</h2>

  <div class="cards">
    <?php
      $query = "SELECT * FROM listings ORDER BY id DESC";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo "
              <div class='card'>
                  <h3>✈️ {$row['departs_from']} → 🛬 {$row['arrives_at']}</h3>
                  <p><strong>Airline:</strong> {$row['airline']}</p>
                  <p><strong>Flight No.:</strong> {$row['flight_number']}</p>
                  <p><strong>Date:</strong> {$row['flight_date']}</p>
                  <p><strong>Remaining Weight:</strong> {$row['remaining_weight']} kg</p>
                  <p><strong>Price:</strong> ₹{$row['price']}</p>
                  <p><strong>Type:</strong> {$row['type']}</p>
                  <p>{$row['description']}</p>
                  <button class='primary' onclick=\"window.location='payment.php?id={$row['id']}'\">Book Now</button>
              </div>";
          }
      } else {
          echo "<p>No listings available right now.</p>";
      }
    ?>
  </div>
</section>

<footer>
  <p>&copy; <?php echo date('Y'); ?> ExcessAir. All Rights Reserved.</p>
</footer>

</body>
</html>
