<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
<title>Edit Doctor registration table</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="table.css">    
</head>
<script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
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
<div class="table-edit">      
<table>
        <tr>
          <th>Prescription ID</th>
          <th>Patient ID</th>
          <th>Doctor ID</th>
          <th>Drug ID</th>
          <th>Prescription date</th>
          <th>Dosage</th>
          <th>Frequency</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "root", "drugdispensingtool");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["update"])) {
                // Update operation
                $PrescriptionID = $_POST["Prescription_ID"];
                $Patient_ID = $_POST["Patient_ID"];
                $Doctor_ID = $_POST["Doctor_ID"];
                $Drug_ID = $_POST["Drug_ID"];
                $Prescription_date = $_POST["Prescription_date"];
                $Dosage = $_POST["Dosage"];
                $Frequency = $_POST["Frequency"];
                $Status = $_POST["Status"];


                $updateQuery = "UPDATE Prescription SET Patient_ID='$Patient_ID', Doctor_ID='$Doctor_ID', Drug_ID='$Drug_ID', Prescription_date='$Prescription_date', Dosage='$Dosage', Frequency='$Frequency', Status='$Status'  WHERE Prescription_ID='$PrescriptionID'";
                $conn->query($updateQuery);
            } elseif (isset($_POST["delete"])) {
                // Delete operation
                $PrescriptionID = $_POST["Prescription_ID"];

                $deleteQuery = "DELETE FROM Prescription WHERE Prescription_ID='$PrescriptionID'";
                $conn->query($deleteQuery);
            }
        }

        $sql = "SELECT Prescription_ID, Patient_ID, Doctor_ID, Drug_ID, Prescription_date, Dosage, Frequency, Status FROM Prescription";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Prescription_ID"] . "</td>";
                echo "<td>" . $row["Patient_ID"] . "</td>";
                echo "<td>" . $row["Doctor_ID"] . "</td>";
                echo "<td>" . $row["Drug_ID"] . "</td>";
                echo "<td>" . $row["Prescription_date"] . "</td>";
                echo "<td>" . $row["Dosage"] . "</td>";
                echo "<td>" . $row["Frequency"] . "</td>";
                echo "<td>" . $row["Status"] . "</td>";


                echo "<td>";
                echo "<form method='POST' action='" . $_SERVER["PHP_SELF"] . "' onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='Prescription_ID' class='action-input' value='" . $row["Prescription_ID"] . "'>";
                echo "<input type='text' name='Patient_ID' class='action-input' value='" . $row["Patient_ID"] . "'>";
                echo "<input type='text' name='Doctor_ID' class='action-input' value='" . $row["Doctor_ID"] . "'>";
                echo "<input type='text' name='Drug_ID' class='action-input' value='" . $row["Drug_ID"] . "'>";
                echo "<input type='date' name='Prescription_date' class='action-input' value='" . $row["Prescription_date"] . "'>";
                echo "<input type='text' name='Dosage' class='action-input' value='" . $row["Dosage"] . "'>";
                echo "<input type='text' name='Frequency' class='action-input' value='" . $row["Frequency"] . "'>";
                echo "<input type='text' name='Status' class='action-input' value='" . $row["Status"] . "'>";

                echo "<input type='submit' name='update' value='Save' class='save-btn'>";
                echo "<input type='submit' name='delete' value='Delete' class='delete-btn'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<tr><td colspan='9'>0 results</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</div>    
<script src="user_homepage.js"></script>
</body>    
</html>
