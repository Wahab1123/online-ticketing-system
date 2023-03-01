<form action="" method="post">
  <select name="service">
    <option value="">Select Service</option>
    <option value="web_design">Web Design</option>
    <option value="web_development">Web Development</option>
    <option value="seo">SEO</option>
  </select>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
  if (isset($_POST['submit'])) {
    $service = $_POST['service'];
    echo "You selected: ".$service;
  }
?>



//hiace or bus user booking
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
$service = isset($_POST['service']) ? $_POST['service'] : '';

if(isset($_POST['submit'])){
 $sql = "INSERT INTO complaintform (source,destination,dtime,ddate,service)
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
