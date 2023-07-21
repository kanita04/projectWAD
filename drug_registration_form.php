<!DOCTYPE html>
<html>
<head>
  <title>Drug Registration</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="drug_form.css"
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
    <div id="menu-btn" class="fas fa-bars" style="font-size: 2.5em;"> </div>
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
</header>
  
  <div class="drug-form">
  <form action="drug_reg.php" method="POST">
  <h2>Drug Registration</h2>

    <label for="drugName">Drug Name:</label>
    <input type="text" id="drugName" name="drugName" required><br><br>

    <label for="mfgDate">Manufacturing Date:</label>
    <input type="date" id="mfgDate" name="mfgDate" required><br><br>

    <label for="expDate">Expiry Date:</label>
    <input type="date" id="expDate" name="expDate" required><br><br>

    <label for="unitPrice">Unit Price:</label>
    <input type="text" id="unitPrice" name="unitPrice" required><br><br>

    <label for="quantityInStock">Quantity in Stock:</label>
    <input type="text" id="quantityInStock" name="quantityInStock" required><br><br>

    <input type="submit" value="Add Drug">
  </form>
  </div>
  <script src="user_homepage.js"></script>
</body>
</html>
