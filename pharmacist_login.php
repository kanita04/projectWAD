<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["pass1"];

    require_once("connection.php");

    // Prepare the SQL statement to check the username and password
    
    $sql = "SELECT * FROM Pharmacist WHERE username = ? AND pass1 = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $pass1);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row is returned (indicating a successful login)
    if ($result->num_rows > 0) {
        // Set the username in the session
        $_SESSION['username'] = $username;
        // Redirect the user to the homepage
        header('Location: pharmacist_homepage.php');
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

<!DOCTYPE html>
<html>
<head>
    <title>Pharmacist Login Page</title>
    <style>
        body {
            background-color: cornsilk;
        }
    </style>
</head>
<body>
    <form method="POST">

    <h2>Pharmacist login</h2>
    
        <label for="username">Username:</label>
        <input type="text" placeholder="Enter username" id="username" name="username" required><br><br>

        <label for="pass1">Password:</label>
        <input type="password" placeholder="Enter password" id="pass1" name="pass1" required><br><br>

        <button type="submit">Login</button>
        <a href="welcome_page.php"><button type="button" class="cancel">Cancel</button></a><br>

        <a style="font-family: cursive;" href="pharmacist_registration_form.php">Don't have an account? Sign up</a>
    </form>
</body>
</html>
