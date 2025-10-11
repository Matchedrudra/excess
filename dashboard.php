<?php include('db/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Dashboard | ExcessAir</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body { font-family: "Poppins",sans-serif; margin:0; background:#f7f9fc; color:#222; }
    header {
      display:flex; justify-content:space-between; align-items:center;
      padding:12px 32px; background: linear-gradient(90deg,#0B3D91,#002060);
      color:#fff; box-shadow:0 4px 12px rgba(0,0,0,0.12);
    }
    .brand { display:flex; align-items:center; gap:12px; cursor:pointer; text-decoration:none; color:inherit; }
    .brand img { width:56px; height:56px; object-fit:cover; border-radius:10px; border:2px solid #FFD700; }
    .brand h1 { margin:0; font-size:22px; color:#FFD700; font-weight:700; font-family:"Playfair Display", serif; }
    nav a { margin-left:20px; color:#fff; text-decoration:none; font-weight:600; }
    nav a:hover { color:#FFD700; }
    .section { padding:40px 20px; max-width:1100px; margin:0 auto; }
    .quote { text-align:center; font-style:italic; margin:12px 0 28px; color:#2d3b5c; }
    .cards { display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:24px; margin-top:24px; }
    .card { background:#fff; padding:22px; border-radius:14px; box-shadow:0 8px 28px rgba(0,0,0,0.08); }
    .card h3 { color:#0B3D91; margin:0 0 10px 0; }
    .card p { margin:8px 0; color:#333; }
    .btn-primary {
      display:inline-block; width:100%; text-align:center; padding:12px 16px; border-radius:10px;
      background:linear-gradient(90deg,#FFD700,#FFC107); color:#002B5B; font-weight:700; border:none; cursor:pointer;
      margin-top:10px;
    }
    footer { text-align:center; padding:16px; background:#0B3D91; color:#fff; margin-top:40px; }
  </style>
</head>
<body>

<!-- Header -->
<header>
  <a class="brand" href="dashboard.php">
    <img src="assets/images/excessair.jpg" alt="ExcessAir Logo" onerror="this.src='assets/images/logo.png';">
    <h1>ExcessAir</h1>
  </a>

  <nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="listing.php">Add Listing</a>
    <a href="view_listing.php">Browse Services</a>
    <a href="bookings.php">My Bookings</a>
    <a href="logout.php">Logout</a>
  </nav>
</header>

<!-- Main Section -->
<section class="section">
  <h2 style="text-align:center;color:#002B5B;">Welcome to Your Dashboard</h2>
  <div class="quote">"Every flight carries a new connection waiting to happen."</div>

  <div class="cards">
    <div class="card">
      <h3>Add New Listing</h3>
      <p>Offer your extra luggage space or assistance to first-time travelers.</p>
      <button class="btn-primary" onclick="window.location.href='listing.php'">Add Listing</button>
    </div>

    <div class="card">
      <h3>Browse Available Services</h3>
      <p>Find travel companions or luggage partners who can make your journey easier.</p>
      <button class="btn-primary" onclick="window.location.href='view_listing.php'">Browse Services</button>
    </div>

    <div class="card">
      <h3>Your Bookings</h3>
      <p>See listings you have booked and track payment status.</p>
      <button class="btn-primary" onclick="window.location.href='bookings.php'">View Bookings</button>
    </div>
  </div>
</section>

<footer>
  <p>&copy; <?php echo date('Y'); ?> ExcessAir. All Rights Reserved.</p>
</footer>

</body>
</html>
