<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>try</title>
</head>
<body>
	
	 <table style="width: 100%;">
  <h1 style="text-align: center; margin-bottom: 20px;">Route-Managers</h1>
  <thead style="background-color: grey; height:30px">
    <tr>
      <th>Name</th>
      <th>phno</th>
      <th>Email</th>
      <th>User-name</th>
      <th>Password</th>
      <th>source</th>
      <th>Destination</th>
      <th>service</th>
      <th>Action</th>
    </tr>
  </thead>
   
<?php
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
  
?>

</table>
</body>
</html>


<?php
  // Connect to the database
  $db = mysqli_connect("localhost", "root", "", "routesystem");
  
  // Check the connection
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }


?>