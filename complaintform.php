<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Complaint Form</title>
  <style>
    label {
      display: block;
      margin-top: 20px;
    }
    select{
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;

    }
    
    input[type=text]{
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
      
    }
     textarea {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
       height:150px;

    }
    
    
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h2>Complaint Form</h2>
  <form action="complaintform.php" method="POST">
    
    <label for="route">Route:</label>
    <input type="text" id="route" name="route" placeholder="Enter route number or name">
    <label for="category">Category:</label>
    <select name="category" id="category">
      <option value="fair">Fair</option>
      <option value="seat">Seat</option>
      <option value="seat">Other</option>
    </select>
    <label for="date">Date of Incident:</label>
    <input type="date" id="idate" name="idate">
    <label for="details">Complaint Details:</label>
    <textarea id="detail" name="detail" placeholder="Enter your complaint details here"></textarea>
    <input type="submit" id="submit" name="submit" value="Submit Complaint">
  </form>
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
$route = isset($_POST['route']) ? $_POST['route'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : '';
$idate = isset($_POST['idate']) ? $_POST['idate'] : '';
$detail = isset($_POST['detail']) ? $_POST['detail'] : '';
$userid = $_SESSION['id'];
//$userid='2';

if(isset($_POST['submit'])){
 $sql = "INSERT INTO complaint (userid,route,category,idate,detail)
        VALUES ('$userid','$route','$category','$idate','$detail')";

if(!mysqli_query($con,$sql)){
  echo 'not inserted';
}
else{
  echo 'inserted successfully';
  header('refresh:2, url=gpttry2.php');
}
}

?>


