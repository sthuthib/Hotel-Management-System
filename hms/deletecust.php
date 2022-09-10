<?php
$CUST_ID = $_GET['CUST_ID'];

include 'databaseconfig/config.php';

$sql = "DELETE FROM customer WHERE CUST_ID = '$CUST_ID'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: http://localhost/hms/crud_customer.php");

mysqli_close($conn);
?>
