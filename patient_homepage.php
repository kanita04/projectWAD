<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <style>
        #username-display {
            position: absolute;
            top: 10px;
            right: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="username-display">
        <?php
        if (isset($_SESSION['username'])) {
            echo 'Welcome, ' . $_SESSION['username'];
        } else {
            echo 'Welcome, Guest';
        }
        ?>
    </div>
<p>Welcome to Duo Pharm. A place where you can find all the drugs you need
    along with medical counselling with a click of a button. Duo Pharm is 
    here to take care of all your needs.  
</p>
</body>
</html>
