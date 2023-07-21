<?php
require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve the form data
  $drugName = $_POST["drugName"];
  $mfgDate = $_POST["mfgDate"];
  $expDate = $_POST["expDate"];
  $unitPrice = $_POST["unitPrice"];
  $quantityInStock = $_POST["quantityInStock"];

  // Prepare the SQL statement
  $sql = "INSERT INTO Drugs (`Drug_name`, `mfg_date`, `exp_date`, `unit_price`, `quantity_in_stock`)
          VALUES ('$drugName', '$mfgDate', '$expDate', '$unitPrice', '$quantityInStock')";

  // Execute the SQL statement
  if ($conn->query($sql) === TRUE) {
    echo "Drug added successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
