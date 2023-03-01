<?php 
session_start();
  // Connect to the database
  $db = mysqli_connect("localhost", "root", "", "onlineticketingsystem");
  
  // Check the connection
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // Retrieve data from the database
  $sid=$_SESSION['id'];
  $sql = "SELECT v.source,v.destination,v.dtime, u.id,u.source,u.destination FROM vehicles v, users u WHERE u.source=v.source AND u.destination= v.destination AND u.id='$sid'";
  $result = mysqli_query($db, $sql);
?>
  <html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      /* Add styles for the header */
      header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: lightgray;
      }
      /* Add styles for the logout button */
      .logout {
        font-size: 18px;
        cursor: pointer;
      }
      /* Add styles for the table */
      table {
        width: 100%;
        border-collapse: collapse;
      }
      /* Add styles for the table cells */
      td, th {
        border: 1px solid black;
        padding: 10px;
      }
      /* Add styles for the "Book Now" button */
      .book-now {
        background-color: green;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <!-- Add the header -->
    <header>
      <p>Route Manager</p>
   <a href="logoutRM.php">   <p class="logout">Logout <i class="fa fa-sign-out"><?php echo $_SESSION['fname']; ?></i></p></a>
    </header>
    <!-- Add the table -->
    <table>
      <thead>
        <tr>
          <th>Source</th>
          <th>Destination</th>
          <th> Departure Time</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo $row['source'];?></td>
          <td><?php echo $row['destination'];?></td>
          <td><?php echo $row['dtime'];?></td>
          <td><a href="seat_req.php">Requests</a></td>
        </tr>
        </tr>
         <?php
      
      $_SESSION["source"] = $row['source'];
      $_SESSION["destination"] = $row['destination'];
    }
    ?>
      </tbody>

    </table>
  </body>
</html>