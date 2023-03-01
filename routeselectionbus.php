
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

                <h1 style="text-align: center;"> BUS BOOKING</h1>

     
      <form action="routeselectionbus.php" method="POST">
        <label for="from" id="source" name= "source">From:</label>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "routesystem";

// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT DISTINCT source FROM addvehicle";
$result = $conn->query($sql);

echo "<select>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option>" . $row["source"]. "</option>";
    }
} else {
    echo "<option>No data found</option>";
}
echo "</select>";

$conn->close();
?>



        <br><br>
        <label for="to" id="destination" name="destination">To:</label>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "routesystem";

// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT DISTINCT destination FROM addvehicle";
$result = $conn->query($sql);

echo "<select>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option>" . $row["destination"]. "</option>";
    }
} else {
    echo "<option>No data found</option>";
}
echo "</select>";

$conn->close();
?>
        <br><br>
       
                <label for="from" id="dtime" name="dtime">Departure Time</label>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "routesystem";

// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT DISTINCT dtime,service FROM addvehicle  where service = 'bus'";
$result = $conn->query($sql);

echo "<select>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option>" . $row["dtime"]. "</option>";
      
    }
} else {
    echo "<option>No data found</option>";
}
echo "</select>";

$conn->close();
?>
  <label for="date">Date</label><br>
    <input type="date" id="ddate" name="ddate">
    <br><br>
        <input type="submit" id="submit" name="submit" value="Submit"><br><br>
          <a href="routeselectionhiace.php">GO BACK </a>

      </form>
    </div>
  </body>
</html>


<?php
$con = mysqli_connect('localhost','root','');
if(!$con){
  echo 'not connected to server';
}
if(!mysqli_select_db($con,'routesystem')){
  echo 'database not connected';
}
//add route manager
$source = isset($_POST['source']) ? $_POST['source'] : '';
$destination = isset($_POST['destination']) ? $_POST['destination'] : '';
$dtime = isset($_POST['dtime']) ? $_POST['dtime'] : '';
$ddate = isset($_POST['ddate']) ? $_POST['ddate'] : '';
$service ='bus';

if(isset($_POST['submit'])){
 $sql = "INSERT INTO seatbooking (source,destination,dtime,ddate,service)
        VALUES ('$source','$destination','$dtime','$ddate','$service')";

if(!mysqli_query($con,$sql)){
  echo 'not inserted';
}
else{
  echo 'inserted successfully';
  header('refresh:2, url=gpttry2.php');
}
}

?>