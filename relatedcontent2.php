




<!DOCTYPE html>
<html>
<head>
<title>admin</title>
 <link rel="stylesheet" type="text/css" href="fontawesome-free-6.2.1-web/css/all.css">
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

   /*.header {
  display: flex;
}

.btn {
  padding: 10px;
  margin: 10px;
  background-color: #008080;
  color: white;
  border: none;
  cursor: pointer;
}*/

/*buttons css*/
html{
  background-color: lightblue;
}

 .header{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    margin-top: 50px;
  }

.btn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 10px;
    border-radius: 5px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  }

  .btn:hover {
    background-color: #3e8e41;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  }

  .fa-icon {
    margin-right: 10px;
  }




.content {
  display: none;
  padding: 10px;
  margin: 10px;
}

#content1, #content2, #content3 {
  display: none;
}

  </style>
</head>
<body>

  <h1 style="font-size: 36px;
    margin-top: 50px; text-align: center; background-color: grey; color: white;">Welcome Admin!</h1>
<div class="header">
  <button class="btn" id="btn1"><i class="fas fa-route fa-icon"></i>Route Manager</button>
  <button class="btn" id="btn2"><i class="fas fa-exclamation-triangle fa-icon"></i>Complaints</button>
  <button class="btn" id="btn3"><i class="fas fa-map-signs fa-icon"></i>Routes</button>
  <button class="btn" id="btn4"><i class="fas fa-bus fa-icon"></i>Vehicles</button>
</div>



<footer>

<div class="content" id="content1">
 <?php
  // Connect to the database
  $db = mysqli_connect("localhost", "root", "", "onlineticketingsystem");
  
  // Check the connection
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // Retrieve data from the database
  $sql = "SELECT * FROM users where source= 'kotli'";
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

  echo "</tr>";
  
  // Populate the table with data from the database
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["fname"] . "</td>";
    echo "<td>" . $row["phonno"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
    echo "<td>" . $row["password"] . "</td>";
    echo "<td>" . $row["source"] . "</td>";
        echo "<td>" . $row["destination"] . "</td>";
   
    echo "</tr>";
  }
  
  echo "</table>";
  
  // Close the database connection
  mysqli_close($db);
?>

      <button     class="add-btn" style="background-color: green;
  color: white;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 5px;">
  <i class="fa fa-plus"></i><a href="addroutemanager.php"> Add New Record</a>
</button>

</div>



<div class="content" id="content2">
   <h1 align=center>Complaints</h1>
 <?php
  // Connect to the database
  $db = mysqli_connect("localhost", "root", "", "onlineticketingsystem");
  
  // Check the connection
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // Retrieve data from the database
 
  $sql = "SELECT c.*,u.fname,email,userid FROM  complaint c, users u WHERE c.userid=u.id";
  $result = mysqli_query($db, $sql);
  
  // Create the HTML table
  echo "<table>";
  echo "<tr>";
  echo "<th>FirstName</th>";
    echo "<th>Email</th>";
    echo "<th>Route</th>";
       echo "<th>Category</th>";
  echo "<th>Incident Date</th>";
    echo "<th>Detail</th>";
  echo "</tr>";
  
  // Populate the table with data from the database
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["fname"] . "</td>";
             echo "<td>" . $row["email"] . "</td>";
  
        echo "<td>" . $row["route"] . "</td>";
          echo "<td>" . $row["category"] . "</td>";
    echo "<td>" . $row["idate"] . "</td>";
        echo "<td>" . $row["detail"] . "</td>";
    echo "</tr>";
  }
  
  echo "</table>";
  
  // Close the database connection
  mysqli_close($db);
?>
<button class="add-btn" style="background-color: green;
  color: white;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 5px;">
  <i class="fa fa-plus"></i> <a href="try3.php">Generate report</a>
</button>
</div>







<div class="content" id="content3">
   <h1 style="text-align: center;">Routes</h1>

 <?php
  // Connect to the database
  $db = mysqli_connect("localhost", "root", "", "onlineticketingsystem");
  
  // Check the connection
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // Retrieve data from the database
  $sql = "SELECT * FROM users where source= 'kotli'";
  $result = mysqli_query($db, $sql);
  
  // Create the HTML table
  echo "<table>";
  echo "<tr>";

  echo "<th>Source</th>";
    echo "<th>Destination</th>";
    echo "<th>Route Manager</th>";
  echo "</tr>";
  
  // Populate the table with data from the database
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";

    echo "<td>" . $row["source"] . "</td>";
        echo "<td>" . $row["destination"] . "</td>";
    
        echo "<td>" . $row["fname"] . "</td>";
    echo "</tr>";
  }
  
  echo "</table>";
  
  // Close the database connection
  mysqli_close($db);
?>

 <a href="addroutemanager.html"><button     class="add-btn" style="background-color: green;
  color: white;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 5px;">
  <i class="fa fa-plus"></i> Add New Record
</button>
</a>

</div>






<div class="content" id="content4">

  <h1 style="text-align: center;">Vehicles</h1>

   <?php
  // Connect to the database
  $db = mysqli_connect("localhost", "root", "", "onlineticketingsystem");
  
  // Check the connection
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // Retrieve data from the database
  $sql = "SELECT  * FROM vehicles ";
  $result = mysqli_query($db, $sql);
  
  // Create the HTML table
  echo "<table>";
  echo "<tr>";
  echo "<th>Vehicle_No</th>";
  echo "<th>Phn_no</th>";
  echo "<th>Source</th>";
    echo "<th>Destination</th>";
  echo "<th>Departure Time</th>";
   echo "<th>Service</th>";
  echo "</tr>";
  
  // Populate the table with data from the database
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["vehicle_no"] . "</td>";
    echo "<td>" . $row["phnno"] . "</td>";
    echo "<td>" . $row["source"] . "</td>";
        echo "<td>" . $row["destination"] . "</td>";
            echo "<td>" . $row["dtime"] . "</td>";
    echo "<td>" . $row["service"] . "</td>";
    echo "</tr>";
  }
  
  echo "</table>";
  
  // Close the database connection
  mysqli_close($db);
?>


<a href="addnewvehicle.php"><button class="add-btn" style="background-color: green;
  color: white;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 5px;">
  <i class="fa fa-plus"></i> Add New Record
</button></a>
</div>


</footer>



  <script>
  // Get all buttons
var btns = document.getElementsByClassName("btn");

// Loop through the buttons
for (var i = 0; i < btns.length; i++) {
  // Add event listener to each button
  btns[i].addEventListener("click", function() {
    // Get the current button's ID
    var currentBtnId = this.id;

    // Hide all content
    var contents = document.getElementsByClassName("content");
    for (var j = 0; j < contents.length; j++) {
      contents[j].style.display = "none";
    }

    // Show the content related to the clicked button
    document.getElementById(currentBtnId.replace("btn", "content")).style.display = "block";
  });
}
    </script>

</body>
</html>



