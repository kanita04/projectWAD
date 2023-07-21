<!DOCTYPE html>
<html>
<head>
    <title>User login</title>
    <link rel="stylesheet" href="user_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

    </style>
</head>

<body>
  <header class="header fixed-top fixed-nav">      
    <div class="container">
      <div class="row align-items-center">
        <a href="#home" class="logo">duo<span>Pharm</span></a>
      </div>
    </div>
  </header>
    <div class="user_login">
        <h1 style="text-align: center;">Welcome to Duo Pharm</h1>

        <h3>Login as:</h2>

        <a href="patient_login2.php"><button type="button">
        Patient</button></a><br><br><br>

        <a href="doctor_login.php"><button type="button">
        Doctor</button></a><br><br><br>

        <a href="pharmacist_login.php"><button type="button">
        Pharmacist</button></a><br><br><br>

        <div class="admin-signin">
        <label id="or" for="or">or</label>
        <a href="admin_login.php"><button id="admin-btn" type="button">Sign in as admin</button></a>
        </div>
    </div>

</body>
</html>