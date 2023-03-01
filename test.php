<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test123</title>
</head>
<body>
	<form action="test.php" method="post">
  <select name="field1">
    <option value="value1">Value 1</option>
    <option value="value2">Value 2</option>
    <option value="value3">Value 3</option>
  </select>
  <input type="text" name="field2">
  <input type="submit" value="Submit">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $field1 = $_POST['field1'];
  $field2 = $_POST['field2'];

  // Connect to database
  $conn = mysqli_connect("localhost", "root", "", "onlineticketingsystem");

  // Update the data
  $sql = "UPDATE table SET field1='$field1', field2='$field2' WHERE id=1";
  $result = mysqli_query($conn, $sql);

  // Check if update was successful
  if ($result) {
    echo "Data updated successfully.";
  } else {
    echo "Error updating data: " . mysqli_error($conn);
  }

  // Close the connection
  mysqli_close($conn);
}

?>
</body>
</html>