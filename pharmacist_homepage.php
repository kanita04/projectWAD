<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pharmacist Homepage</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to duo Pharm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="users_homepage2.css">
</head>

<body>
<header class="header fixed-top">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <a href="#home" class="logo">duo<span>Pharm</span></a>

        <div class="right">
          <form id="search">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
          <!-- <a href="homepage.php" class="btn">Log out</a> -->
          <div class="dropdown">
            <div class="dropdown-icon">
              <div id="user-icon" class="fas fa-user" style="font-size: 1.5em;"></div>
              <div id="username-display" style="font-size: 1.5em;">
                <?php
                if (isset($_SESSION['username'])) {
                  echo $_SESSION['username'];
                } else {
                  echo 'Welcome, Guest';
                }
                ?>
              </div>
              <div id="dropdown-menu" class="fas fa-caret-down"></div>
            </div>
            <div class="dropdown-content">
              <a href="#">View profile</a>
              <a href="homepage[1].php">Log out</a>
            </div>
          </div>
          <div id="menu-btn" class="fas fa-bars" style="font-size: 2.5em;"></div>
        </div>
        <div id="side-nav" class="side-nav">
          <ul>
            <button id="close-btn" class="close-btn"><i class="fas fa-xmark" style="color: #000000;"></i></button>   
            <li><a id="logo" href="#home" class="logo">duo<span>Pharm</span></a></li>   
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>    
          </ul>
        </div>
      </div>
    </div>
</header>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
      <section class="homepage" id="homepage">
        <div class="content text-center text-md-left">
          <h3>Your Health is our Priority</h3>
          <p>Welcome to Duo Pharm. A place where you can find all the drugs you need along with medical counselling with a click of a button. Duo Pharm is here to take care of all your needs.</p>
          <p>What would you like to do next?</p>

          <div class="directions">
                <a href="drug_registration_form.php"><button type="button">Add drugs</button></a><br><br><br>
                <a href="prescriptions_view_table.php"><button type="button">View prescriptions</button></a><br><br><br>
                <a href="dispense_drugs.php"><button type="button">Dispense drugs</button></a><br><br><br>
                <a href="view_dispensed_drugs.php"><button type="button">History of drugs dispensed</button></a><br><br><br>
          </div>
        </div>
      </section>
    </div>
    <div class="col-md-6">
      <div class="pharmacist-background-image"></div>
    </div>
  </div>
</div>

<script src="user_homepage.js"></script>
</body>
</html>

