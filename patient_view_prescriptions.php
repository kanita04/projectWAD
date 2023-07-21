<?php
session_start();
require_once("connection.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the user is logged in (based on your session implementation)
if (!isset($_SESSION['username'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: patient_login2.php");
    exit;
}

// Get the patient's username from the session
$patientUsername = $_SESSION['username'];

// Get the patient's details from the database
$sql = "SELECT Patient_ID FROM Patient WHERE username = '$patientUsername'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $patientID = $row['Patient_ID'];

    // Fetch the patient's prescriptions based on the Patient_ID
    $sql = "SELECT * FROM Prescription WHERE Patient_ID = '$patientID'";
    $prescriptionResult = $conn->query($sql);
} else {
    echo "Patient not found!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient's Prescriptions</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to duo Pharm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" />
    <!-- Add your custom CSS file here -->
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
        <h1>Patient's Prescriptions</h1>
        <table>
            <thead>
                <tr>
                    <th>Prescription ID</th>
                    <th>Doctor ID</th>
                    <th>Drug ID</th>
                    <th>Prescription Date</th>
                    <th>Dosage</th>
                    <th>Frequency</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

            <?php 
            if ($prescriptionResult && $prescriptionResult->num_rows > 0) {
                while ($row = $prescriptionResult->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['Prescription_ID'] . "</td>
                            <td>" . $row['Doctor_ID'] . "</td>
                            <td>" . $row['Drug_ID'] . "</td>
                            <td>" . $row['Prescription_date'] . "</td>
                            <td>" . $row['Dosage'] . "</td>
                            <td>" . $row['Frequency'] . "</td>
                            <td>" . $row['Status'] . "</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No prescriptions found.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
<script src="user_homepage.js"></script>

</body>
</html>
