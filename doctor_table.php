<?php
require_once("connection.php");

// sql to create table
$sql = "CREATE TABLE Doctor (
    
    Doctor_ID INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    pass1  VARCHAR(50) NOT NULL,
    fname VARCHAR(30) NOT NULL,
    lname VARCHAR(30) NOT NULL,
    DOB date NOT NULL,
    gender VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    years_of_experience INT NOT NULL,
    
    UNIQUE(username),
    CHECK(gender in('Male','Female'))
     )";
    //echo "table created ";

    if ($conn->query($sql) === TRUE) {
      echo "Table Doctor created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    

?>