<?php
require_once("connection.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['prescription_id']) && isset($_POST['dispensed_checkbox']) && $_POST['dispensed_checkbox'] == '1') {
        // Get the prescription ID from the form
        $prescriptionId = $_POST['prescription_id'];

        // Update the 'pre_status' column to 'Dispensed'
        $updateSql = "UPDATE Prescription SET Status = 'Dispensed' WHERE Prescription_ID = '$prescriptionId'";
        if ($conn->query($updateSql) === TRUE) {
            header("Location: dispense_drugs.php");
        } else {
            echo "Error updating prescription status: " . $conn->error;
        }
    }
}
?>
