<?php
session_start();
require_once("connection.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the values from the form
    $prescriptionId = $_POST['prescription_id'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];

    // Insert the dispensed drugs into the Dispensed_Drugs table
    $sql = "INSERT INTO Dispensed_Drugs (Prescription_ID, Date_Dispensed, Price, Amount)
            VALUES ('$prescriptionId', CURDATE(), '$price', '$amount')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['dispense_success'] = true;
        header("Location: dispense_drugs.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$result = null;

// Retrieve the patient's prescriptions
if (isset($_GET['search_query'])) {
    $searchQuery = $_GET['search_query'];

    // Search for the patient using the username
    $sql = "SELECT Patient_ID FROM Patient WHERE username = '$searchQuery'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $patientId = $row['Patient_ID'];

        // Fetch the patient's prescriptions based on the Patient_ID
        $sql = "SELECT * FROM Prescription WHERE Patient_ID = '$patientId'";
        $result = $conn->query($sql);
    } else {
        // Patient not found
        $result = null;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dispense Drugs</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to duo Pharm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="dispense_drugs.css">
</head>
<body class="text-center mt-5 mb-5">
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
            </div>
        </div>
    </header>


    <?php if ($result !== null) { ?>
        <section class="table">
            <div class="container">
                <?php if ($result->num_rows > 0) { ?>
                    <h2 class="mb-3">Patient's Prescriptions</h2>
                    <table class="prescription-table mx-auto">
                        <tr>
                            <th>Prescription ID</th>
                            <th>Patient ID</th>
                            <th>Doctor ID</th>
                            <th>Drug ID</th>
                            <th>Prescription Date</th>
                            <th>Dosage</th>
                            <th>Frequency</th>
                            <th>Status</th>
                            
                        </tr>

                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['Prescription_ID']; ?></td>
                                <td><?php echo $row['Patient_ID']; ?></td>
                                <td><?php echo $row['Doctor_ID']; ?></td>
                                <td><?php echo $row['Drug_ID']; ?></td>
                                <td><?php echo $row['Prescription_date']; ?></td>
                                <td><?php echo $row['Dosage']; ?></td>
                                <td><?php echo $row['Frequency']; ?></td>
                                <td><?php echo $row['Status']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php } else { ?>
                    <p>No prescriptions found for the patient.</p>
                <?php } ?>
            </div>
        </section>
    <?php } ?>

    <!-- Display Prescription Success Message Here -->
    <?php if (isset($_SESSION['dispense_success']) && $_SESSION['dispense_success']) { ?>
    <p style='color: green; font-size:1em'>The drug was dispensed successfully!</p>
    <?php unset($_SESSION['dispense_success']); // Remove the success flag from session ?>
<?php } ?>  
    
    <section class="user-login mt-2" id="dispensing-form">
        <div class="container">
            <h1>Dispense Drugs</h1>

            <form method="GET" action="">
                <label for="search_query">Patient Username:</label>
                <input type="text" name="search_query" required>
                <button type="submit">Search</button>
            </form>

            <!-- Form to dispense drugs -->
            <?php if ($result !== null) { ?>
                <form method="POST" action="update_prescription_status.php" class="dispense-drugs">
                    <label for="prescription_id">Prescription ID:</label>
                    <input type="text" name="prescription_id" required><br>

                    <label for="price">Price:</label>
                    <input type="text" name="price" required><br>

                    <label for="amount">Amount:</label>
                    <input type="text" name="amount" required><br>

                    <label for="dispensed_checkbox">Dispensed:</label>
                    <input type="checkbox" name="dispensed_checkbox" value="1">

                    <button type="submit" id="dispense-btn">Dispense Drugs</button>
                </form>
            <?php } ?>
        </div>
    </section>
<script src="user_homepage.js"></script>
</body>
</html>
