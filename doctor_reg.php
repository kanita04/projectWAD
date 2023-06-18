<?php
require_once("connection.php");

//get the post records
$username = $_POST["txtusername"];
$pass1 = $_POST["pass1"];
$pass2 = $_POST["pass2"];
$fname = $_POST["txtfname"];
$lname = $_POST["txtlname"];
$DOB = $_POST["DOB"];
$gender = $_POST["gender"];
$email = $_POST["txtEmail"];
$phone = $_POST["txtPhone"];
$YOE = $_POST["YOE"];


// database insert SQL code
if($pass1==$pass2){
$sql = "INSERT INTO Doctor (`username`, `pass1`, `fname` ,`lname`, `DOB`, `gender`, `email`, `phone`, `years_of_experience`) VALUES ( '$username','$pass1', '$fname', '$lname' , '$DOB', '$gender', '$email', '$phone', '$YOE')";

// insert in database 
   if ($conn->query($sql) === TRUE) {
  echo "New doctor record created successfully";
  }else{
    echo "Registration unsuccessful";
 }
}else{
  echo "Password did not match";
}
?>