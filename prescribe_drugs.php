<?php
session_start();
require_once("connection.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the required form fields are set and not empty
    if (isset($_POST['patient_id']) && isset($_POST['doctor_id']) && isset($_POST['drug_id'])
        && isset($_POST['dosage']) && isset($_POST['frequency'])) {

        // Get the values from the form
        $patientId = $_POST['patient_id'];
        $doctorId = $_POST['doctor_id'];
        $drugId = $_POST['drug_id'];
        $dosage = $_POST['dosage'];
        $frequency = $_POST['frequency'];

        // Insert the prescription into the Prescription table
        $sql = "INSERT INTO Prescription (Patient_ID, Doctor_ID, Drug_ID, Prescription_date, Dosage, Frequency)
                VALUES ('$patientId', '$doctorId', '$drugId', CURDATE(), '$dosage', '$frequency')";

        if ($conn->query($sql) === TRUE) {
            header("Location: prescribe_drugs.php");
            $_SESSION['prescription_success'] = true;
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Required fields are missing.";
    }
}

// Retrieve patient details if the patient username is provided
if (isset($_GET['search_query'])) {
    $searchQuery = $_GET['search_query'];

    // Search for the patient using the username
    $sql = "SELECT * FROM Patient WHERE username = '$searchQuery'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $patientId = $row['Patient_ID'];

        // Fetch the patient's details based on the Patient_ID
        $sql = "SELECT * FROM Patient WHERE Patient_ID = '$patientId'";
        $result = $conn->query($sql);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prescribe Drugs</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="prescribe_drugs.css">
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

    <!-- Display Patient Details in a Table -->
    <?php if (isset($_GET['search_query']) && isset($result)) { ?>
        <section class="table">
            <div class="container">
                <?php if ($result->num_rows > 0) { ?>
                    <h2 class="mb-3">Patient Details</h2>
                    <table class="prescription-table mx-auto">
                        <tr>
                            <th>Patient ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>

                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['Patient_ID']; ?></td>
                                <td><?php echo $row['fname']; ?></td>
                                <td><?php echo $row['lname']; ?></td>
                                <td><?php echo $row['DOB']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>  
                            </tr>
                        <?php } ?>
                    </table>
                <?php } else { ?>
                    <p>No data found for the patient.</p>
                <?php } ?>
            </div>
        </section>
    <?php } ?>

    <!-- Display Prescription Success Message Here -->
    <?php if (isset($_SESSION['prescription_success']) && $_SESSION['prescription_success']) { ?>
        <p style='color: green; font-size: 1em;'>Prescription was successful!</p>
        <?php unset($_SESSION['prescription_success']); // Remove the success flag from session ?>
    <?php } ?>

    <section class="user-login mt-2" id="dispensing-form">
        <div class="container">
            <h1>Prescribe Drugs</h1>

            <form method="GET" action="">
                <label for="search_query">Patient Username:</label>
                <input id="seaarch" type="text" name="search_query" required>
                <button type="submit">Search</button>
            </form>

            <?php if (isset($_GET['search_query']) && isset($result)) { ?>
                <form method="POST" action="" class="dispense-drugs">

                    <input type="hidden" name="patient_id" value="<?php echo $patientId; ?>">

                    <label for="doctor_id">Doctor ID:</label>
                    <input type="text" name="doctor_id" required>

                    <label for="drug_id">Drug ID:</label>
                    <input type="text" name="drug_id" required>

                    <label for="dosage">Dosage:</label>
                    <input type="text" name="dosage" required>

                    <label for="frequency">Frequency:</label>
                    <input type="text" name="frequency" required>

                    <button id="dispense-btn" type="submit">Prescribe</button>

                </form>
            <?php } ?>
        </div>
    </section>    

    <script src="user_homepage.js"></script>
</body>
</html>
