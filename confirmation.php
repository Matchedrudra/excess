<?php 
include('db/connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $listing_id = intval($_POST['id']);
    $card_number = htmlspecialchars($_POST['card_number']);
    $expiry_date = htmlspecialchars($_POST['expiry_date']);
    $cvv = htmlspecialchars($_POST['cvv']);

    // Optional: Here you can integrate payment gateway logic
    // For now, we just simulate a successful payment

    $listing_result = mysqli_query($conn, "SELECT * FROM listings WHERE id=$listing_id");
    $listing = mysqli_fetch_assoc($listing_result);

    if ($listing) {
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Booking Confirmation | ExcessAir</title>
            <link rel='stylesheet' href='assets/css/style.css'>
        </head>
        <body>
        <header>
            <div onclick=\"window.location='dashboard.php';\" style='display:flex;align-items:center;cursor:pointer;'>
                <img src='assets/images/logo.png' alt='ExcessAir Logo'>
                <h1>ExcessAir</h1>
            </div>
            <div>
                <a href='dashboard.php'>Dashboard</a>
                <a href='listing.php'>Add Listing</a>
                <a href='view_listing.php'>Browse Services</a>
                <a href='logout.php'>Logout</a>
            </div>
        </header>
        <section class='section'>
            <h2 style='color:#002B5B;'>Payment Successful!</h2>
            <div class='card' style='max-width:500px;margin:auto;'>
                <h3>" . ucfirst($listing['type']) . ": " . htmlspecialchars($listing['title']) . "</h3>
                <p><strong>Details:</strong> " . htmlspecialchars($listing['description']) . "</p>
                <p><strong>Price Paid:</strong> ₹" . $listing['price'] . "</p>
                <p><strong>Payment Status:</strong> <span style='color:green;'>Confirmed</span></p>
            </div>
            <p style='text-align:center;margin-top:20px;'>
                <a href='view_listing.php'>Back to Services</a>
            </p>
        </section>
        <footer>
            <p>&copy; " . date('Y') . " ExcessAir. All Rights Reserved.</p>
        </footer>
        </body>
        </html>";
    } else {
        echo "<p>Invalid listing. Payment failed.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>
