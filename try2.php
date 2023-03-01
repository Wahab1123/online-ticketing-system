<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>addroutemanager</title>
  <style type="text/css">
    body{
      background-color: lightblue;
    }
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
   <h1 style="text-align: center; margin-bottom: 20px;">Route-Managers</h1>
<?php
  // Connect to the database
  $db = mysqli_connect("localhost", "root", "", "routesystem");
  
  // Check the connection
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // Retrieve data from the database
  $sql = "SELECT * FROM addroutemanager";
  $result = mysqli_query($db, $sql);
  
  // Create the HTML table
  echo "<table>";
  echo "<tr>";
  echo "<th>Name</th>";
  echo "<th>Phn_no</th>";
  echo "<th>Email</th>";
    echo "<th>Username</th>";
  echo "<th>Password</th>";
  echo "<th>Source</th>";
    echo "<th>Destination</th>";
  echo "<th>Service</th>";
  echo "</tr>";
  
  // Populate the table with data from the database
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["phn_no"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["uname"] . "</td>";
    echo "<td>" . $row["password"] . "</td>";
    echo "<td>" . $row["source"] . "</td>";
        echo "<td>" . $row["destination"] . "</td>";
    echo "<td>" . $row["service"] . "</td>";
    echo "</tr>";
  }
  
  echo "</table>";
  
  // Close the database connection
  mysqli_close($db);
?>

</body>
</html>