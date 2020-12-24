<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="buttons.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="footer.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="navbar.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="scrollbar.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="splitscreen.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="tables.css?v=<?php echo time(); ?>">
<style>
</style>
</head>
<body>

<?php
$con = mysqli_connect('localhost','root','','classicmodels');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"classicmodels");
$sql="SELECT officeCode,city,phone,addressLine1,addressLine2 FROM offices";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>City</th>
<th>Address</th>
<th>Phone Number</th>
<th>Employees</th>
</tr>";
while($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['city'] . "</td>";
  echo "<td>" . $row['addressLine1'] . " " . $row['addressLine2'] . "</td>";
  echo "<td>" . $row['phone'] . "</td>";
  echo '<td><button value="' . $row['officeCode'] . '" id="employees" onclick="showEmployee(this.value)">Employees</button></td>'; 
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>