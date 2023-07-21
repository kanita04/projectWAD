<?php
require_once("connection.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to create the Appointments table with a default value for Appointment_Status
$sql = "CREATE TABLE Appointments (
    Appointment_ID INT(11) AUTO_INCREMENT PRIMARY KEY,
    Patient_ID INT NOT NULL,
    Doctor_ID INT NOT NULL,
    Appointment_Date DATE NOT NULL,
    Appointment_Time TIME NOT NULL,
    Appointment_Status VARCHAR(50) NOT NULL DEFAULT 'Scheduled',

    FOREIGN KEY (Patient_ID) REFERENCES Patient(Patient_ID),
    FOREIGN KEY (Doctor_ID) REFERENCES Doctor(Doctor_ID)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Appointments created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the connection
$conn->close();
?>
