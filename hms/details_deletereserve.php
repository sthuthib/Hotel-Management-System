<?php
$RESERVE_ID = $_GET['RESERVE_ID'];

include 'databaseconfig/config.php';

$sql = "DELETE FROM RESERVATION WHERE RESERVE_ID = '$RESERVE_ID'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: http://localhost/hms/details_reserve.php");

mysqli_close($conn);
?>