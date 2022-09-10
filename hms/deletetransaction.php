<?php
$TRANSACTION_ID = $_GET['TRANSACTION_ID'];
include 'databaseconfig/config.php';
$sql = "DELETE FROM TRANSACTIONS WHERE TRANSACTION_ID = '$TRANSACTION_ID'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: http://localhost/hms/crud_transaction.php");
mysqli_close($conn);

?>