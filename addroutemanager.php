<!DOCTYPE html>
<html>
  <head>
    <title>Add Route Manager</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    
    
    body {
  background-color: gray;
  font-family: Arial, sans-serif;
}

.form-container {
  background-color: white;
  padding: 20px;
  border-radius: 10px;
  width: 50%;
  margin: 100px auto;
}

h1 {
  text-align: center;
}

label {
  font-weight: bold;
  display: block;
}

input[type="text"], input[type="email"], input[type="password"] {
  padding: 10px;
  border-radius: 5px;
  border:2px solid black;
  width: 98%;
  margin-bottom: 20px;
}

select {
  padding: 10px;
  border-radius: 5px;
  border:2px solid black;
  width: 100%;
  margin-bottom: 20px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4
      }
    
    
    </style>
  </head>
  <body>
    <div class="form-container">
      <h1>Add Route Manager</h1>
      <form action="addroutemanager.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <br><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phn_no" name="phn_no">
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br><br>
        <label for="username">Username:</label>
        <input type="text" id="uname" name="uname">
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br><br>
        <label for="source">Source:</label>
        <input type="text" id="source" name="source">
        <br><br>
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination">
        
        <br><br>
        <input type="submit" value="submit" id="submit" name="submit">
      </form>
    </div>
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
//add route manager
$name = isset($_POST['name']) ? $_POST['name'] : '';
$phn_no = isset($_POST['phn_no']) ? $_POST['phn_no'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$uname = isset($_POST['uname']) ? $_POST['uname'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$source = isset($_POST['source']) ? $_POST['source'] : '';
$destination = isset($_POST['destination']) ? $_POST['destination'] : '';

if(isset($_POST['submit'])){
 $sql = "INSERT INTO users (fname,phonno,email,username,password,type,source,destination)
        VALUES ('$name','$phn_no','$email','$uname','$password','manager','$source','$destination')";

if(!mysqli_query($con,$sql)){
  echo 'not inserted';
}
else{
  echo 'inserted successfully';
  header('refresh:2, url=relatedcontent2.php');
}
}

?>