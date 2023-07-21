<?php
require_once("connection.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// sql to create table
$sql = "CREATE TABLE Prescription (

  Prescription_ID INT PRIMARY KEY AUTO_INCREMENT,
  Patient_ID INT NOT NULL,
  Doctor_ID INT NOT NULL,
  Drug_ID INT NOT NULL,
  Prescription_date date NOT NULL,
  Dosage varchar(30) NOT NULL,
  Frequency varchar(30) NOT NULL,
  p_status VARCHAR(10) NOT NULL DEFAULT 'Pending',

  FOREIGN KEY (Patient_ID) REFERENCES Patient(Patient_ID),
  FOREIGN KEY (Doctor_ID) REFERENCES Doctor(Doctor_ID),
  FOREIGN KEY (Drug_ID) REFERENCES Drugs(Drug_ID)

 )";

    //echo "table created ";

    if ($conn->query($sql) === TRUE) {
      echo "Table Prescription created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    

?>