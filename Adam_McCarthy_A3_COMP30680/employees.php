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
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','classicmodels');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"classicmodels");
$sql="SELECT firstName,lastName,jobTitle,employeeNumber,email FROM employees WHERE officeCode='".$q."' ORDER BY jobTitle";
$result = mysqli_query($con,$sql);

echo "<table>
<caption>Employee Details</caption>
<tr>
<th>Name</th>
<th>Job Title</th>
<th>Employee Number</th> 
<th>Email Address</th>
</tr>";
while($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['firstName'] . " " . $row['lastName'] . "</td>";
  echo "<td>" . $row['jobTitle'] . "</td>";
  echo "<td>" . $row['employeeNumber'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>