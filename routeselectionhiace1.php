
<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Travel Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    
    body {
  background-image: url('bg.jpg');
  background-size: cover;
  font-family: Arial, sans-serif;
      background-color:gray
}

.form-container {
  background-color: rgba(255, 255, 255, 0.8);
  padding: 20px;
  border-radius: 10px;
  width: 50%;
  margin: 100px auto;
}

label {
  font-weight: bold;
}

select {
  padding: 10px;
  border-radius: 5px;
  border: none;
  width: 100%;
  margin-bottom: 20px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-top: 20px;
}

    
    
    </style>
  </head>
  <body>
    <div class="form-container">
      <form action="test12.php" method="POST">
        <label for="from">From:</label>
        <select id="source" name="source">
          <option value="kotli">Kotli</option>
        </select>
        <br><br>
        <label for="to">To:</label>
        <select id="destination" name="destination">
          <option value="Mirpur">Mirpur</option>
          <option value="Dadyal">Dadyal</option>
          <option value="Nakyal">Nakyal</option>
          <option value="Rawalakot">Rawalakot</option>
          <option value="Rawalpindi">Rawalpindi</option>
          <option value="Sehnsa">Sehnsa</option>
          <option value="Khuiratta">Khuiratta</option>
          <option value="Lahore">Lahore</option>
          <option value="Jhelum">Jhelum</option>
          <option value="Palandri">Palandri</option>
        </select>
        <br><br>
        <label for="via">Time</label>
        <select id="dtime" name="dtime">
          <option value="">Select a Time for Departure</option>
          <option value="6:00">6:00</option>
          <option value="6:30">6:30</option>
          <option value="7:00">7:00</option>
          <option value="7:30">7:30</option>
          <option value="8:00">8:00</option>
          <option value="8:30">8:30</option>
          <option value="9:00">9:00</option>
          <option value="10:00">9:30</option>
          <option value="10:00">10:00</option>
          <option value="10:30">10:30</option>
          <option value="11:00">11:00</option>
          <option value="11:30">11:30</option>
          <option value="12:00">12:00</option>
          <option value="12:30">12:30</option>
          <option value="13:00">13:00</option>
          <option value="13:30">13:30</option>
          <option value="14:00">14:00</option>
          <option value="14:30">14:30</option>
          <option value="15:00">15:00</option>
          <option value="15:00">15:30</option>
          <option value="15:30">16:00</option>
          <option value="16:00">16:30</option>
          <option value="17:00">17:00</option>
          <option value="17:30">17:30</option>
          <option value="18:00">18:00</option>
          <option value="18:30">18:30</option>
          <option value="19:00">19:00</option>
        </select>
        <br><br>
        <input type="date" name="ddate" id="ddate"   pattern="\d{4}-\d{2}-\d{2}">
        <br><br>
        <input type="submit" value="Submit" name="submit">
      </form>
    </div>
    <div class="nothing" style="height: 500px;"></div>
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
$source = $_POST['from1']  ? $_POST['from1'] : '';
$destination = $_POST['to2']  ? $_POST['to2'] : '';
$dtime = $_POST['dtime']  ? $_POST['dtime'] : '';
$ddate = $_POST['ddate']  ? $_POST['ddate'] : '';
//$ddate = isset($_POST['ddate']) ? $_POST['ddate'] : '';

//echo $_SESSION["id"];
$userid = $_SESSION['id'];
//  $userid='2';


if(isset($_POST['submit'])){
 $sql = "INSERT INTO seatbook (userid,source,destination,dtime,ddate) VALUES ('$userid','$source','$destination','$dtime','$ddate')";

if(!mysqli_query($con,$sql)){
  echo 'not inserted';
}
else{
  echo 'inserted successfully';
  header('refresh:2, url=gpttry2.php');
}
}
 ?>