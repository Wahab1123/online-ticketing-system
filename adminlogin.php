<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Login Page</title>
  <style>
    .container {
    width: 70%;
    margin: 0 auto;
    text-align: center;
}

form {
    margin-top: 100px;
}

h1 {
    margin-bottom: 50px;
}

.form-group {
    position: relative;
    margin-bottom: 30px;
}

.form-group i {
    position: absolute;
    left: 10px;
    top: 10px;
    color: gray;
}

input {
    padding-left: 40px;
    width: 100%;
    height: 40px;
    border-radius: 20px;
    border: none;
    box-shadow: 0 0 5px gray;
}

button {
    width: 50%;
    height: 40px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 70px;
    margin-top: 20px;
    cursor: pointer;
}

button:hover {
    background-color: #3e8e41;
}

    
    
  </style>
</head>
<body>
   

    <div class="container">
        <form action="adminlogin.php" method="POST">
            <h1>Login</h1>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

</body>
</html>
<?php
$host = "localhost";
$user = "root";
$password = "";
$db="routesystem";
$conn= mysqli_connect("localhost","root","","onlineticketingsystem") or die('Unable to connect database');
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if(isset($_POST['username'])){
  $username=$_POST['username'];
  $password=$_POST['password'];

$select = mysqli_query($conn, "SELECT * FROM users WHERE username ='$username' AND password='$password' ");
$row = mysqli_fetch_array($select);
 if(is_array($row)){
  $_SESSION["username"] = $row['username'];
  $_SESSION["password"] = $row['password'];
echo '<script>alert("Successfully Login")</script>';
 if(isset($_SESSION["username"],$_SESSION["password"])){
    header('refresh:1, url=relatedcontent2.php');
  }

}
else{
echo '<script>alert("Incorrect Data")</script>';
}

}

?>