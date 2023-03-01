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
       height:200px;
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
  //$sql = "SELECT s.id,s.destination,c.id,c.route FROM complaint c, seatbook s ";
  $sql = "SELECT id FROM seatbook";
  $compsql = "SELECT id FROM complaint";
  $rousql = "SELECT DISTINCT destination FROM vehicles";
  $result = mysqli_query($db, $sql);
  $compresult = mysqli_query($db, $compsql);
  $rouresult = mysqli_query($db, $rousql);
  $total_book= mysqli_num_rows($result);
  $total_comp= mysqli_num_rows($compresult);
  $total_rou= mysqli_num_rows($rouresult);
  
  // Create the HTML table
  echo "<table>";
  echo "<tr>";
    echo "<th>Route - $total_rou</th>";
    echo "<th>Total Complaints - $total_comp</th>";
    echo "<th>Total Booked Seats - $total_book</th>";
  echo "</tr>";
  
  // Populate the table with data from the database
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
        /*echo "<td>" . $row["destination"] . "</td>";
        echo "<td>" . $row["c.id"] . "</td>";
    echo "</tr>";*/
  }
  
  echo "</table>";
  
  // Close the database connection
  mysqli_close($db);
?>
</body>
</html>