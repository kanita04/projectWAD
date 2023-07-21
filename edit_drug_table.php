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
          <th>Drug ID</th>
          <th>Drug name</th>
          <th>Mfg. date</th>
          <th>Exp. date</th>
          <th>Unit price</th>
          <th>Quantity</th>
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
              $drugID = $_POST["Drug_ID"]; // Corrected from $_POST["drug_id"]
              $drug_name = $_POST["drug_name"]; // Changed to 'drug_name'
              $mfg_date = $_POST["mfg_date"];
              $exp_date = $_POST["exp_date"]; // Corrected from $_POST["mfg_date"]
              $unit_price = $_POST["unit_price"];
              $quantity = $_POST["quantity_in_stock"];
      
              $updateQuery = "UPDATE Drugs SET drug_name='$drug_name', mfg_date='$mfg_date', exp_date='$exp_date', unit_price='$unit_price', quantity_in_stock='$quantity' WHERE Drug_ID='$drugID'";
              $conn->query($updateQuery);
          }
        
      } elseif (isset($_POST["delete"])) {
                // Delete operation
                $drugID = $_POST["Drug_ID"];

                $deleteQuery = "DELETE FROM Drugs WHERE Drug_ID='$drugID'";
                $conn->query($deleteQuery);
            }
        

        $sql = "SELECT Drug_ID, Drug_name, mfg_date, exp_date, unit_price, quantity_in_stock FROM Drugs";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Drug_ID"] . "</td>";
                echo "<td>" . $row["Drug_name"] . "</td>";
                echo "<td>" . $row["mfg_date"] . "</td>";
                echo "<td>" . $row["exp_date"] . "</td>";
                echo "<td>" . $row["unit_price"] . "</td>";
                echo "<td>" . $row["quantity_in_stock"] . "</td>";
                echo "<td>";
                echo "<form method='POST' action='" . $_SERVER["PHP_SELF"] . "' onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='Drug_ID' class='action-input' value='" . $row["Drug_ID"] . "'>";
                echo "<input type='text' name='drug_name' class='action-input' value='" . $row["Drug_name"] . "'>";
                echo "<input type='date' name='mfg_date' class='action-input' value='" . $row["mfg_date"] . "'>";
                echo "<input type='date' name='exp_date' class='action-input' value='" . $row["exp_date"] . "'>";
                echo "<input type='text' name='unit_price' class='action-input' value='" . $row["unit_price"] . "'>";
                echo "<input type='text' name='quantity_in_stock' class='action-input' value='" . $row["quantity_in_stock"] . "'>";
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
