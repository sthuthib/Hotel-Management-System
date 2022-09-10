<?php
$PAY_ID = $_GET['PAY_ID'];

include 'databaseconfig/config.php';

$sql = "DELETE FROM PAYMENT WHERE PAY_ID = '$PAY_ID'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: http://localhost/hms/crud_payment.php");

mysqli_close($conn);

?>