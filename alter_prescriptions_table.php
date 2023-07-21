<?php
require_once("connection.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to delete the 'Status' column
$sql = "ALTER TABLE Prescription ADD COLUMN pre_status VARCHAR(10) NOT NULL DEFAULT 'Pending' AFTER Frequency;";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Column 'Status' added successfully.";
} else {
    echo "Error deleting column: " . $conn->error;
}

$conn->close();
 ?>
