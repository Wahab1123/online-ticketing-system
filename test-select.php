<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
<form action="submit.php" method="post">
  <label for="first_select">First Select:</label>
  <select id="first_select" name="first_select">
    <option value="">Please select</option>
    <option value="option1">Option 1</option>
    <option value="option2">Option 2</option>
    <option value="option3">Option 3</option>
  </select>
  <br><br>
  <label for="second_select">Second Select:</label>
  <select id="second_select" name="second_select">
    <option value="">Please select</option>
    <?php
      if (isset($_POST['first_select'])) {
        $selectedOption = $_POST['first_select'];
        if ($selectedOption == 'option1') {
          echo '<option value="suboption1">Option 1 - Suboption 1</option>';
          echo '<option value="suboption2">Option 1 - Suboption 2</option>';
        }
        if ($selectedOption == 'option2') {
          echo '<option value="suboption1">Option 2 - Suboption 1</option>';
          echo '<option value="suboption2">Option 2 - Suboption 2</option>';
        }
        if ($selectedOption == 'option3') {
          echo '<option value="suboption1">Option 3 - Suboption 1</option>';
          echo '<option value="suboption2">Option 3 - Suboption 2</option>';
        }
      }
    ?>
  </select>
  <br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>