<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>complain fetch try</title>
	<style>
     table{
      width: 100%;
      border: 3px solid whitesmoke;
    }
    th{
      font-size: 25px;
      color: #ccbb66;
       background-color: indianred; 
       height:40px;
    }
    tr td{
      
      background-color: #bbaabb;
      text-align: center;
      font-size: 20px;
    }
</style>
</head>
<body>
 <?php
  // Connect to the database
  $db = mysqli_connect("localhost", "root", "", "onlineticketingsystem");
  
  // Check the connection
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // Retrieve data from the database
  $id= $_SESSION["id"];
  //echo $id;
  $sql = "SELECT s.*, u.id,u.fname,u.email FROM seatbook s, users u WHERE s.userid='$id' AND s.userid=u.id";
  $result = mysqli_query($db, $sql);
  
  // Create the HTML table
  echo "<table id='myTable'>";
  echo "<tr>";
  echo "<th>Name</th>";
    echo "<th>Email</th>";
       echo "<th>Source</th>";
  echo "<th>Destination</th>";
    echo "<th>Departure Time</th>";
    echo "<th>Date</th>";
    echo "<th>Status</th>";
  echo "</tr>";
  
  // Populate the table with data from the database
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["fname"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
          echo "<td>" . $row["source"] . "</td>";
    echo "<td>" . $row["destination"] . "</td>";
    echo "<td>" . $row["dtime"] . "</td>";
    echo "<td>" . $row["ddate"] . "</td>";
    echo "<td>" . $row["status"] . "</td>";
    echo "</tr>";
  }
  
  echo "</table>";
  
  // Close the database connection
  mysqli_close($db);
?>

<script>
var table = document.getElementById("myTable");
var rows = table.getElementsByTagName("tr");

for (var i = 0; i < rows.length; i++) {
  rows[i].onclick = function() {
    var cells = this.getElementsByTagName("td");
    console.log("Row data: ");
    for (var j = 0; j < cells.length; j++) {
      console.log("Column " + (j + 1) + ": " + cells[j].innerHTML);
    }
    window.print();
  };
}
</script>
</body>
</html>