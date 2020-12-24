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
$sql="SELECT productCode, productName, productScale, productVendor, productDescription FROM products WHERE productLine='".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<caption>Product Details</caption>
<tr>
<th>Product Code</th>
<th>Product Name</th>
<th>Product Scale</th>
<th>Product Vendor</th>
<th>Product Description</th> 
</tr>";
while($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['productCode'] . "</td>";
  echo "<td>" . $row['productName'] . "</td>";
  echo "<td>" . $row['productScale'] . "</td>";
  echo "<td>" . $row['productVendor'] . "</td>";
  echo "<td>" . $row['productDescription'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>