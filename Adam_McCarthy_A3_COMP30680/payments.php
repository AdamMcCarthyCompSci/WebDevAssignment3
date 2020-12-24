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
$sql="SELECT checkNumber,paymentDate,amount,customerNumber FROM payments ORDER BY paymentDate DESC LIMIT 20";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Check Number</th>
<th>Payment Date</th>
<th>Amount</th>
<th>Customer Number</th>
</tr>";
while($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['checkNumber'] . "</td>";
  echo "<td>" . $row['paymentDate'] . "</td>";
  echo "<td>" . $row['amount'] . "</td>";
  echo "<td>" . '<button value="' . $row['customerNumber'] . '" id="' . $row['customerNumber'] . '" onclick="customers(this.value)">' . $row['customerNumber'] . '</button>' . '</td>';
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>