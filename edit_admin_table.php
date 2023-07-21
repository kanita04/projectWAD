<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
<title>Edit Admin registration table</title>
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
            <th>Admin ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Email address</th>
            <th>Phone number</th>
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
                $AdminID = $_POST["Admin_id"];
                $firstName = $_POST["first_name"];
                $lastName = $_POST["last_name"];
                $dob = $_POST["dob"];
                $gender = $_POST["gender"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];

                $updateQuery = "UPDATE Admin_table SET fname='$firstName', lname='$lastName', DOB='$dob', gender='$gender', email='$email', phone='$phone' WHERE Admin_ID='$AdminID'";
                $conn->query($updateQuery);
            } elseif (isset($_POST["delete"])) {
                // Delete operation
                $AdminID = $_POST["Admin_id"];

                $deleteQuery = "DELETE FROM Admin_table WHERE Admin_ID='$AdminID'";
                $conn->query($deleteQuery);
            }
        }

        $sql = "SELECT Admin_ID, fname, lname, DOB, gender, email, phone FROM Admin_table";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Admin_ID"] . "</td>";
                echo "<td>" . $row["fname"] . "</td>";
                echo "<td>" . $row["lname"] . "</td>";
                echo "<td>" . $row["DOB"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>";
                echo "<form method='POST' action='" . $_SERVER["PHP_SELF"] . "' onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='Admin_id' class='action-input' value='" . $row["Admin_ID"] . "'>";
                echo "<input type='text' name='first_name' class='action-input' value='" . $row["fname"] . "'>";
                echo "<input type='text' name='last_name' class='action-input' value='" . $row["lname"] . "'>";
                echo "<input type='date' name='dob' class='action-input' value='" . $row["DOB"] . "'>";
                echo "<input type='text' name='gender' class='action-input' value='" . $row["gender"] . "'>";
                echo "<input type='email' name='email' class='action-input' value='" . $row["email"] . "'>";
                echo "<input type='text' name='phone' class='action-input' value='" . $row["phone"] . "'>";
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
