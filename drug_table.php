<?php
require_once("connection.php");

// sql to create table
$sql = "CREATE TABLE Drugs (
    
    Drug_ID INT PRIMARY KEY AUTO_INCREMENT,
    Drug_name VARCHAR(50) NOT NULL,
    mfg_date date NOT NULL,
    exp_date date NOT NULL,
    unit_price VARCHAR(30) NOT NULL,
    quantity_in_stock VARCHAR(30) NOT NULL

     )";
    //echo "table created ";

    if ($conn->query($sql) === TRUE) {
      echo "Table Drugs created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    
?>