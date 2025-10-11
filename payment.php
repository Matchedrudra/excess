<?php include('db/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment | ExcessAir</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
<div onclick="window.location='dashboard.php';" style="display:flex;align-items:center;cursor:pointer;">
    <img src="assets/images/excessair.jpg" alt="ExcessAir Logo" style="height:50px;margin-right:10px;">
    <h1>ExcessAir</h1>
</div>
<div>
    <a href="dashboard.php">Dashboard</a>
    <a href="listing.php">Add Listing</a>
    <a href="view_listing.php">Browse Services</a>
    <a href="logout.php">Logout</a>
</div>
</header>

<section class="section">
<?php
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM listings WHERE id=$id");
    $listing = mysqli_fetch_assoc($result);
    if(!$listing) {
        echo "<p>Listing not found.</p>";
        exit;
    }
?>
<h2 style="color:#002B5B;">Confirm Payment for Booking</h2>
<div class="card" style="max-width:500px;margin:auto;">
    <h3>
        <?php 
        echo (isset($listing['departs_from']) ? $listing['departs_from'] : 'N/A') 
             . " → " . 
             (isset($listing['arrives_at']) ? $listing['arrives_at'] : 'N/A'); 
        ?>
    </h3>
    <p><strong>Date:</strong> <?php echo isset($listing['flight_date']) ? $listing['flight_date'] : 'N/A'; ?></p>
    <p><strong>Service by:</strong> User <?php echo $listing['user_id']; ?></p>
    <p><strong>Price:</strong> ₹<?php echo $listing['price']; ?></p>

    <form action="confirmation.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $listing['id']; ?>">

        <label>Card Number</label>
        <input type="text" name="card_number" maxlength="16" required placeholder="1234 5678 9012 3456">

        <label>Expiry Date</label>
        <input type="text" name="expiry_date" placeholder="MM/YY" required>

        <label>CVV</label>
        <input type="password" name="cvv" maxlength="3" required placeholder="123">

        <button type="submit" class="primary">Pay ₹<?php echo $listing['price']; ?></button>
    </form>
</div>
<?php } else {
    echo "<p>Invalid Listing.</p>";
} ?>
</section>

<footer>
<p>&copy; <?php echo date('Y'); ?> ExcessAir. All Rights Reserved.</p>
</footer>

</body>
</html>
