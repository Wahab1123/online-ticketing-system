
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
        <h1 style="text-align: center;"> HIACE BOOKING</h1>
      <form action="routeselectionhiace.php" method="POST">
        <label for="from">From:</label>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlineticketingsystem";

// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);
?>

<select name="source" id="source">
    <option value="kotli">Kotli</option>
</select>

        <br><br>
        <label for="to">To:</label>
        <select name="dest" id="dest">
            <option value="mirpur">Mirpur</option>
            <option selected value="dadyal">Dadyal</option>
        </select>
    
        <br><br>
                <label for="from">Departure Time</label>
        <?php
// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$echo $_POST["dest"];
$sql = "SELECT dtime FROM vehicles WHERE destination='mirpur'";
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
        <input type="submit" value="Submit" name="submit"><br><br>
         <a href="routeselectionbus.php">CLICK FOR BUS BOOKING </a>
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
$source = isset($_POST['source']) ? $_POST['source'] : '';
$destination = isset($_POST['destination']) ? $_POST['destination'] : '';
$dtime = isset($_POST['dtime']) ? $_POST['dtime'] : '';
$ddate = isset($_POST['ddate']) ? $_POST['ddate'] : '';
$userid='2';

if(isset($_POST['submit'])){
 $sql = "INSERT INTO seatbook (userid,source,destination,dtime,ddate)
        VALUES ('$userid','$source','$destination','$dtime' '$ddate')";

if(!mysqli_query($con,$sql)){
  echo 'not inserted';
}
else{
  echo 'inserted successfully';
  header('refresh:2, url=gpttry2.php');
}
}

?>