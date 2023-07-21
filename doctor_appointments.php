<?php
session_start();
require_once("connection.php"); // Replace with your database connection code

// Check if the user is logged in (based on your session implementation)
if (!isset($_SESSION['username'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: doctor_login.php");
    exit;
}

// Get the doctor's username from the session
$doctorUsername = $_SESSION['username'];

// Retrieve the doctor_ID based on the username
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the doctor's details from the database
$sql = "SELECT Doctor_ID FROM Doctor WHERE username = '$doctorUsername'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $doctorID = $row['Doctor_ID'];

    // Fetch the Doctor's appointments based on the Doctor_ID
    $sql = "SELECT * FROM Appointments WHERE Doctor_ID = '$doctorID'";
    $appointmentResult = $conn->query($sql);
} else {
    echo "Doctor not found!";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Appointments</title>
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

    <div class="table">
    <h2>Appointments for <?php echo $doctorUsername; ?></h2>

    <table>
        <tr>
            <th>Appointment ID</th>
            <th>Patient ID</th>
            <th>Appointment Date</th>
            <th>Appointment Time</th>
            <th>Appointment Status</th>
        </tr>

        <?php
        if ($appointmentResult->num_rows > 0) {
            while ($appointmentRow = $appointmentResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $appointmentRow['Appointment_ID'] . "</td>";
                echo "<td>" . $appointmentRow['Patient_ID'] . "</td>";
                echo "<td>" . $appointmentRow['Appointment_Date'] . "</td>";
                echo "<td>" . $appointmentRow['Appointment_Time'] . "</td>";
                echo "<td>" . $appointmentRow['Appointment_Status'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No appointments found.</td></tr>";
        }
        ?>
    </table>
    </div>
    <script src="user_homepage.js"></script>

</body>
</html>
