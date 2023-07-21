<?php
session_start();
require_once("connection.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the doctor is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Retrieve the doctor's ID based on the username
    $sql = "SELECT Doctor_ID FROM Doctor WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $doctorId = $row['Doctor_ID'];

    // Retrieve prescriptions for the specific doctor
    $sql = "SELECT * FROM Prescription WHERE Doctor_ID = '$doctorId'";
        $result = $conn->query($sql);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor's Prescriptions</title>
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
        <h1>Doctor's Prescriptions</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Prescription ID</th>
                    <th>Patient ID</th>
                    <th>Drug ID</th>
                    <th>Prescription Date</th>
                    <th>Dosage</th>
                    <th>Frequency</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['Prescription_ID']; ?></td>
                        <td><?php echo $row['Patient_ID']; ?></td>
                        <td><?php echo $row['Drug_ID']; ?></td>
                        <td><?php echo $row['Prescription_date']; ?></td>
                        <td><?php echo $row['Dosage']; ?></td>
                        <td><?php echo $row['Frequency']; ?></td>
                        <td><?php echo $row['Status']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
