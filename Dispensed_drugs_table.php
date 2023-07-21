<?php
require_once("connection.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// sql to create table
$sql = "CREATE TABLE Dispensed_Drugs (
    Dispensed_ID INT PRIMARY KEY AUTO_INCREMENT,
    Prescription_ID INT NOT NULL,
    Date_Dispensed DATE NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    Amount VARCHAR(30) NOT NULL,
    FOREIGN KEY (Prescription_ID) REFERENCES Prescription(Prescription_ID)
)";

    //echo "table created ";

    if ($conn->query($sql) === TRUE) {
      echo "Table created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    

?>