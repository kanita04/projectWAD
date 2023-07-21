<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $password = $_POST["pass1"];

  // Check if the entered password matches the required admin password
  $adminPassword = "1234"; // Change this to your desired admin password
  if ($password === $adminPassword) {
    header("Location: admin_registration_form.php");
    exit();
  } else {
    $login_error = "Invalid username or password. Please try again.";
  }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                background-color: #eee;
                display: flex;
                justify-content: center;
                align-items: center;
                height: fit-content;
                margin: 0;
                padding-top: 6rem;
            }
            .validation{
                background-color: #b0dfe5;
                justify-content: center;
                border-radius: 8px;
                padding: 10px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
                max-width: 400px;
                width: 50%;
                margin-top: 150px;
                align-items: center;
                display: block;
            }
            .error-message {
                color: red;
                font-size: 14px;
                margin-top: 10px;
                text-align: center;
            }                   
            #submit{
                display: inline;
                align-items: center;
                color: white;
                background-color: gray;
                border: 1px solid black;
            }
        </style>
        <title>Admin validation</title>
    </head>
    <body>
        <div class="validation">
            <form method="POST">
                <h3>Please enter admin password</h3>
                <label for="pass1">Password: </label>
                <input type="password" name="pass1" placeholder="Enter password" required>

                <input type="submit" name="submit" id="submit">
                <?php if (!empty($login_error)) : ?>
                <p class="error-message"><?php echo $login_error; ?></p>
                <?php endif; ?>                
            </form>
        </div>
    </body>
</html>