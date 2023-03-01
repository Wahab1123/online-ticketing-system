<?php
session_start();
	$con = mysqli_connect("localhost", "root", "");
	if(!$con)
	{
		echo 'Not Connected to Server';
	}
	
	if(!mysqli_select_db($con,'onlineticketingsystem'))
	{
		echo 'Database not connected';
	}
	
	$source = $_POST['source'];
	$destination = $_POST['destination'];
	$dtime = $_POST['dtime'];
	$userid = $_SESSION['id'];
	echo $_SESSION['id'];
	//$Password = $_POST['password'];
	//$Feeder = $_POST['feeder'];
	
	if(isset($_POST['submit'])){
	$sql = "INSERT INTO seatbook (userid,source,destination,dtime) VALUES ('$userid','$source','$destination','$dtime')";
	if(!mysqli_query($con,$sql))
	{
		echo 'Not Added! Go back & try again';
	} else
	{
		echo 'Added Successfully';
		?>
		<script type="text/javascript">
			setTimeout(function(){
				window.location.href='gpttry2.php';
			},5000);
		</script>
<?php
	}
}
	
?>