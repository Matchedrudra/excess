<?php include('db/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ExcessAir | Connecting Travelers Beyond Limits</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">

  <style>
    /* General Styles */
    body { font-family: 'Poppins', sans-serif; margin:0; padding:0; background-color:#fff; color:#333; }
    header { display:flex; justify-content:space-between; align-items:center; padding:10px 50px; background-color:#0B3D91; color:white; }
    header h1 { margin-left: 10px; font-family: 'Playfair Display', serif; color: #FFD700; }
    header a { margin-left: 20px; color: white; text-decoration: none; font-weight:600; }
    header a:hover { text-decoration: underline; }

    /* HERO SECTION */
    .hero { text-align:center; padding:80px 20px; background: linear-gradient(to right, #0B3D91, #FFD700); color:white; }
    .hero-title { font-size:48px; margin-bottom:20px; }
    .hero-title span { color:#FFD700; }
    .hero-subtitle { font-size:20px; margin-bottom:30px; }
    .hero-buttons button { padding:12px 25px; margin:10px; border:none; border-radius:5px; cursor:pointer; font-weight:600; transition:0.3s; }
    .hero-buttons .primary { background-color:#FFD700; color:#0B3D91; }
    .hero-buttons .primary:hover { opacity:0.8; }
    .hero-buttons .secondary { background-color:white; color:#0B3D91; }
    .hero-buttons .secondary:hover { opacity:0.8; }

    /* AIRLINE SECTION */
    .airline-section { overflow:hidden; padding:40px 0; background-color:#f7f7f7; text-align:center; }
    .airline-section h3 { margin-bottom:20px; font-size:28px; color:#0B3D91; }
    .airline-track { display:flex; gap:50px; width:max-content; animation: scrollLogos 20s linear infinite; }
    .airline-logo { width:100px; height:100px; object-fit:contain; }
    @keyframes scrollLogos { 0% { transform: translateX(100%); } 100% { transform: translateX(-100%); } }

    /* FEATURES SECTION */
    .features { padding:60px 20px; text-align:center; }
    .features h3 { margin-bottom:40px; font-size:32px; color:#0B3D91; }
    .feature-cards { display:flex; justify-content:center; gap:30px; flex-wrap:wrap; }
    .card { background-color:white; padding:20px; border-radius:10px; width:250px; box-shadow:0 4px 6px rgba(0,0,0,0.1); transition:0.3s; }
    .card:hover { transform:translateY(-5px); box-shadow:0 6px 12px rgba(0,0,0,0.2); }
    .card h4 { margin-bottom:15px; }

    /* QUOTE SECTION */
    .quote-section { background-color:#0B3D91; color:white; padding:50px 20px; text-align:center; }
    .quote-section blockquote { font-size:24px; margin-bottom:20px; font-style:italic; }

    /* FOOTER */
    footer { text-align:center; padding:20px; background-color:#0B3D91; color:white; }
  </style>
</head>
<body>

<!-- HEADER -->
<header>
  <div onclick="window.location='index.php';" style="display:flex;align-items:center;cursor:pointer;gap:10px;">
    <img src="assets/images/excessair.jpg" alt="ExcessAir Logo" style="width:55px;height:55px;object-fit:contain;border-radius:8px;">
    <h1>ExcessAir</h1>
  </div>
  <div>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
    <a href="dashboard.php">Dashboard</a>
  </div>
</header>

<!-- HERO SECTION -->
<section class="hero">
  <div class="hero-content">
    <h2 class="hero-title">Connecting Travelers<br><span>Beyond Limits</span></h2>
    <p class="hero-subtitle">Share, Help, and Travel Smarter – Together with <strong>ExcessAir</strong>.</p>
    <div class="hero-buttons">
      <button class="primary" onclick="window.location='register.php'">Join Now</button>
      <button class="secondary" onclick="window.location='view_listing.php'">Browse Services</button>
    </div>
  </div>
</section>

<!-- AIRLINE SUPPORT SECTION -->
<section class="airline-section">
  <h3>Partner Airlines Supporting ExcessAir</h3>
  <div class="airline-track">
    <img src="assets/images/emirates.jpg" alt="Emirates" class="airline-logo">
    <img src="assets/images/etihad.jpg" alt="Etihad" class="airline-logo">
    <img src="assets/images/Air-India-01.jpg" alt="Air India" class="airline-logo">
    <img src="assets/images/indigo.jpg" alt="Indigo" class="airline-logo">
    <img src="assets/images/delta.jpg" alt="Delta" class="airline-logo">
    <img src="assets/images/lufthansa.jpg" alt="Lufthansa" class="airline-logo">
    <img src="assets/images/quantas.jpg" alt="Quantas" class="airline-logo">
    <img src="assets/images/singapore.jpg" alt="Singapore" class="airline-logo">
  </div>
</section>

<!-- FEATURES SECTION -->
<section class="features">
  <h3>Why Choose ExcessAir?</h3>
  <div class="feature-cards">
    <div class="card feature">
      <h4>💼 Share Extra Luggage</h4>
      <p>Earn by helping others send their luggage safely on your flight.</p>
    </div>
    <div class="card feature">
      <h4>🤝 Travel Together</h4>
      <p>Connect with fellow travelers to assist elderly or first-time flyers.</p>
    </div>
    <div class="card feature">
      <h4>💳 Safe Payments</h4>
      <p>Integrated secure transactions and verified traveler profiles.</p>
    </div>
  </div>
</section>

<!-- QUOTE SECTION -->
<section class="quote-section">
  <blockquote>“The world is meant to be explored — and shared.”</blockquote>
  <p>– Team ExcessAir ✈️</p>
</section>

<!-- FOOTER -->
<footer>
  <p>&copy; <?php echo date('Y'); ?> ExcessAir. All Rights Reserved.</p>
</footer>

<script src="assets/js/script.js"></script>
</body>
</html>
