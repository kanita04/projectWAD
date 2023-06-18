<!DOCTYPE html>
<html>
<body style="background-color: cornsilk;">
    
<h2>Doctor Registration form</h2>

<form  action="doctor_reg.php" method="POST">

  <label for="fname">First name:</label>
  <input type="text" id="txtfname" name="txtfname"><br><br>

  <label for="lname">Last name:</label>
  <input type="text" id="txtlname" name="txtlname" ><br><br>

  <label for="DOB">Date of Birth:</label>
  <input type="date" id="DOB" name="DOB"><br><br>

  <label for="gender">Gender:</label>
  <input type="checkbox" id="female" name="gender" value="female"
  <label for="female">female</label>
  <input type="checkbox" id="male" name="gender" value="male">
  <label for="male">male</label><br><br>

  <label for="email">Email address:</label>
  <input type="email" id="txtEmail" name="txtEmail" ><br><br>

  <label for="phone">Phone number:</label>
  <input type="tel" id="txtPhone" name="txtPhone"><br><br>

  <label for="YOE">Years of experience:</label>
  <input type="number" id="YOE" name="YOE"><br><br>

  <label for="username">Create username:</label>
  <input type="text" id="txtusername" name="txtusername"><br><br>

  <label for="pass1">New Password:</label><br>
  <input type="password"  name="pass1"><br>
           
  <label for="pass2">Confirm Password:</label><br>
  <input type="password" name="pass2"><br>

  <input formaction="doctor_reg.php" type="submit" name="submit"> 
  
</form> 
</body>
</html>
