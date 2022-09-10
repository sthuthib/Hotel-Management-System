<?php
$EMP_ID = $_GET['EMP_ID'];

include 'databaseconfig/config.php';

$sql = "DELETE FROM EMPLOYEE WHERE EMP_ID = '$EMP_ID'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: http://localhost/hms/crud_employee.php");

mysqli_close($conn);

?>