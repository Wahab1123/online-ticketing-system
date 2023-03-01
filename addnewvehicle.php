<!DOCTYPE html>
<html>
  <head>
    <title>Transportation Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    body {
  background-color: #4CAF50; /* You can change this color to any other desired color */
  font-family: Arial, sans-serif;
}

.form-container {
  background-color: white;
  padding: 20px;
  border-radius: 10px;
  width: 50%;
  margin: 100px auto;
}

label {
  font-weight: bold;
}

input[type="text"], input[type="time"] {
  padding: 10px;
  border-radius: 5px;
  border: 1px  solid black;
  width: 97%;
  margin-bottom: 20px;
}

select {
  padding: 10px;
  border-radius: 5px;
  border: 1px  solid black;
  width: 100%;
  margin-bottom: 20px;
}

input[type="submit"] {
  background-color: #006400;
  color: white;
  padding: 12px 20px;
  border: 1px green;
  border-radius: 4px;
  cursor: pointer;
  margin-top: 20px;
}

    
    </style>
  </head>
  <body>
    <div class="form-container">
      <h1>New Vehicle</h1>
      <form action="addnewvehicle.php" method="POST">
        <label for="vehicle-number">Vehicle Number:</label>
        <input type="text" id="vehicle_no" name="vehicle_no">
        <br><br>
         <label for="phone">Phone:</label>
        <input type="text" id="phn_no" name="phn_no">
        <br><br>
        <label for="source">Source:</label>
        <input type="text" id="source" name="source">
        <br><br>
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination">
        <br><br>
        <label for="departure-time">Departure Time:</label>
        <input type="time" id="dtime" name="dtime">
        <br><br>
      
  
        <input type="submit" id="submit" name="submit" value="submit">
        
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
$vehicle_no = isset($_POST['vehicle_no']) ? $_POST['vehicle_no'] : '';
$phn_no = isset($_POST['phn_no']) ? $_POST['phn_no'] : '';
$source = isset($_POST['source']) ? $_POST['source'] : '';
$destination = isset($_POST['destination']) ? $_POST['destination'] : '';
$dtime = isset($_POST['dtime']) ? $_POST['dtime'] : '';

if(isset($_POST['submit'])){
 $sql = "INSERT INTO vehicles (vehicle_no,phnno,source,destination,dtime)
        VALUES ('$vehicle_no','$phn_no','$source','$destination','$dtime')";

if(!mysqli_query($con,$sql)){
  echo 'not inserted';
}
else{
  echo 'inserted successfully';
  header('refresh:2, url=relatedcontent2.php');
}
}

?>
