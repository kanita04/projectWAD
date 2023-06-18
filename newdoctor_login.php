<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["pass1"];

    require_once("connection.php");

    // Prepare the SQL statement to check the username and password
    $sql = "SELECT * FROM Doctor WHERE username = ? AND pass1 = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password); // Corrected variable name here
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row is returned (indicating a successful login)
    if ($result->num_rows > 0) {
        // Set the username in the session
        $_SESSION['username'] = $username;
        // Redirect the user to the homepage
        header('Location: doctor_homepage.php');
        exit();
    } else {
        // Display an error message for unsuccessful login
        echo "Login unsuccessful. Incorrect username or password.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
