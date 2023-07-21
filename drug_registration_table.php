<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
<title>Drug registration table</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to duo Pharm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="table.css">    
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
<div class="table">      
    <table>
        <tr>
          <th>Drug ID</th>
          <th>Drug name</th>
          <th>Mfg. date</th>
          <th>Exp. date</th>
          <th>Unit price</th>
          <th>Quantity</th>
        </tr>
        <?php 
        $conn = mysqli_connect("localhost", "root", "root","drugdispensingtool");
         if($conn->connect_error){
            die("Connection failed: ".$conn->connect_error);
         }
        
        $sql = "SELECT Drug_ID, Drug_name, mfg_date, exp_date, unit_price, quantity_in_stock from Drugs";
        $result = $conn -> query($sql);

        if ($result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
                echo "<tr><td>". $row["Drug_ID"] . "</td><td>" . $row["Drug_name"] . "</td><td>" . $row["mfg_date"] . "</td><td>" . $row["exp_date"] . "</td><td>". $row["unit_price"] . "</td><td>" . $row["quantity_in_stock"] . "</td></tr>";
            }
            echo "</table>";
        }
        else{
            echo "0 result";
        }
        ?>
    </table>
    <a href="edit_drug_table.php"><button type="button">Edit data</button></a>
</div>    
<script src="user_homepage.js"></script>
</body>    
</html>