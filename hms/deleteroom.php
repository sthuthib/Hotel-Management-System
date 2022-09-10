<?php
$ROOM_ID = $_GET['ROOM_ID'];

include 'databaseconfig/config.php';

$sql = "DELETE FROM ROOM WHERE ROOM_ID = '$ROOM_ID'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: http://localhost/hms/crud_room.php");

mysqli_close($conn);

?>