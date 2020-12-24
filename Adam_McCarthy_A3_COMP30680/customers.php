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
$sql="SELECT customers.phone,customers.salesRepEmployeeNumber,customers.creditLimit FROM customers,payments WHERE payments.customerNumber='".$q."' AND customers.customerNumber=payments.customerNumber LIMIT 1";
$result = mysqli_query($con,$sql);
echo "<table>
<caption>Customer Details</caption>
<tr>
<th>Phone Number</th>
<th>Sales Rep</th>
<th>Credit Limit</th>
</tr>";
while($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['phone'] . "</td>";
  echo "<td>" . $row['salesRepEmployeeNumber'] . "</td>";
  echo "<td>" . $row['creditLimit'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_select_db($con,"classicmodels");
$sql="SELECT payments.checkNumber,payments.paymentDate,payments.amount FROM customers,payments WHERE payments.customerNumber='".$q."' AND customers.customerNumber=payments.customerNumber ORDER BY paymentDate DESC";
$result = mysqli_query($con,$sql);

echo "</br>";
echo "<table>
<caption>Customer Payment History</caption>
<tr>
<th>Check Number</th>
<th>Payment Date</th>
<th>Amount</th>
</tr>";
$total = 0;
while($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['checkNumber'] . "</td>";
  echo "<td>" . $row['paymentDate'] . "</td>";
  echo "<td>" . $row['amount'] . "</td>";
  echo "</tr>";
  $total += floatval($row['amount']);
}
echo "</tr><th></th><th>Total:</th><th>". $total . "</th></tr>";
echo "</table>";

mysqli_close($con);
?>
</body>
</html>