<!DOCTYPE html>
<html>
<head>
<title>Signup</title>
  <style>
   /* Form Styling */
    form {
      width: 70%;
      margin: 0 auto;
      border: 1px solid black;
      padding: 20px;
    }
    /* Form Inputs */
input[type="text"], input[type="email"], input[type="password"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

/* Submit Button */
input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
}
label {
  font-size: 20px;
  font-weight: bold;
  color: #333;
  background-color: #f2f2f2;
}
/* Responsive Form */
@media (max-width: 480px) {
  form {
    width: 100%;
    margin: 0;
  }
}
    
  </style>
</head>
<body>
<form action="signup.php" method="POST">
  <h1>Registeration Form</h1>
    <label for="full-name"> Full Name:</label>
    <input type="text" id="fname" name="fname" required>

<label for="phone-number">Phone Number:</label>
<input type="text" id="phn_no" name="phn_no" required>

<label for="email">Email:</label>
<input type="email" id="email" name="email" required>

<label for="username">Username:</label>
<input type="text" id="uname" name="uname" required>

<label for="password">Password:</label>
<input type="password" id="password" name="password" required>

<input type="submit" value="Submit" id="submit" name="submit" onsubmit=clear>
  </form>

</body>
</html>


<?php
$con = mysqli_connect('localhost','root','');
if(!$con){
  echo 'not connected to server';
}
if(!mysqli_select_db($con,'onlineticketingsystem')){
  echo 'database not connected';
}

$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
$phn_no = isset($_POST['phn_no']) ? $_POST['phn_no'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$uname = isset($_POST['uname']) ? $_POST['uname'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if(isset($_POST['submit'])){
 $sql = "INSERT INTO users (fname,phonno,email,username,password,type)
        VALUES ('$fname','$phn_no','$email','$uname','$password','passenger')";

if(!mysqli_query($con,$sql)){
  echo 'not inserted';
}
else{
  echo 'inserted successfully';
  header('refresh:2, url=login.php');
}
}

?>