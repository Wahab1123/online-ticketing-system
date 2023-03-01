<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login form</title>
    <style type="text/css">
           /* Form Styles */
  form {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 60%;
    margin: 0 auto;
    padding: 2rem 0;
  }

  form h1 {
    font-size: 2rem;
    margin-bottom: 1rem;
  }

  form input[type="text"], form input[type="password"] {
    width: 100%;
    font-size: 1.2rem;
    padding: 0.5rem;
    border: none;
    border-bottom: 1px solid #333;
  }

  form input[type="submit"] {
    font-size: 1.2rem;
    background-color: #333;
    color: #fff;
    padding: 0.75rem;
    border: none;
    margin-top: 1rem;
  }

  /* Responsive Styles */
  @media screen and (max-width: 480px) {
    form {
      width: 80%;
    }
  }
    </style>
</head>
<body>
<form action="login-routemanager.php" method="POST">
  <h1>Login</h1>
  <input type="text" placeholder="Username" name="uname" id="uname" required>
  <input type="password" placeholder="Password" name="password" id="password" required>
  <input type="submit" value="Submit">
</form>
</body>
</html>
<?php
$host = "localhost";
$user = "root";
$password = "";
$db="routesystem";
$conn= mysqli_connect("localhost","root","","onlineticketingsystem") or die('Unable to connect database');
$uname = isset($_POST['uname']) ? $_POST['uname'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if(isset($_POST['uname'])){
  $uname=$_POST['uname'];
  $password=$_POST['password'];

$select = mysqli_query($conn, "SELECT * FROM users WHERE username ='$uname' AND password='$password' AND type='manager' ");
$row = mysqli_fetch_array($select);
 if(is_array($row)){
  $_SESSION["username"] = $row['username'];
  $_SESSION["password"] = $row['password'];
  $_SESSION["fname"] = $row['fname'];
  $_SESSION["id"] = $row['id'];
echo '<script>alert("Successfully Login")</script>';
 if(isset($_SESSION["username"],$_SESSION["password"])){
    header('refresh:1, url=routemanagerpage.php');
  }

}
else{
echo '<script>alert("Incorrect Data")</script>';
}

}

?>