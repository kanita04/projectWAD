<?php
require_once("connection.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// sql to create table
$sql = "ALTER TABLE Prescription CHANGE COLUMN pre_status Status VARCHAR(10) NOT NULL DEFAULT 'Pending';";

    //echo "table created ";

    if ($conn->query($sql) === TRUE) {
      echo "Table altered successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    

?>