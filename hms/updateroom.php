<?php

include 'headers/headerroom.php';

if (isset($_POST['updatebtn'])) {

  //include "config.php";

  $ROOM_ID = $_POST["e1"];
  $ROOM_TYPE = $_POST["e2"];
  $ROOM_BED = $_POST["e3"];
  $ROOM_MEAL = $_POST["e4"];
  $RPRICE = $_POST["e5"];


  include 'databaseconfig/config.php';

  //$sql = "UPDATE student SET SNAME = '$SNAME', ADDRESS = '$ADDRESS', PHONE = '$PHONE',GENDER = '$GENDER' WHERE USN = '$USN'";
  //or
  $sql = "UPDATE ROOM SET ROOM_TYPE = '{$ROOM_TYPE}', ROOM_BED = '{$ROOM_BED}', ROOM_MEAL = '{$ROOM_MEAL}', RPRICE = '{$RPRICE}' WHERE ROOM_ID = '{$ROOM_ID}'";

  header("Location: http://localhost/hms/crud_room.php");

  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

  header("Location: http://localhost/hms/crud_room.php");

  mysqli_close($conn);
}
?>



<?php
include 'databaseconfig/config.php';

$ROOM_ID = $_GET['ROOM_ID'];

//$sql = "SELECT * FROM student WHERE USN = {$usn}";

$sql = "SELECT * FROM ROOM WHERE ROOM_ID = '$ROOM_ID'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
?>



    <div id="main-content">
      <h2>Update Record</h2>
      <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="form-group">
          <label>Room ID</label>
          <input type="text" name="e1" value="<?php echo $row['ROOM_ID']; ?>" />
        </div>

        <div class="form-group">
          <label>Room Type</label>
          <select name="e2" value="<?php echo $row['ROOM_TYPE']; ?>">
            <option value="Superior">Superior</option>
            <option value="Deluxe">Deluxe</option>
            <option value="Single">Single</option>
          </select>
        </div>

        <div class="form-group">
          <label>Bedding</label>
          <select name="e3" value="<?php echo $row['ROOM_BED']; ?>">
            <option value="Single">Single</option>
            <option value="Double">Double</option>
            <option value="Triple">Triple</option>
            <option value="Quad">Quad</option>
          </select>
        </div>

        <div class="form-group">
          <label>Room Meal</label>
          <select name="e4" value="<?php echo $row['ROOM_MEAL']; ?>">
            <option value="Room Only">Room Only</option>
            <option value="Breakfast">Breakfast</option>
            <option value="Half Board">Half Board</option>
            <option value="Full Board">Full Board</option>
          </select>
        </div>

        <div class="form-group">
          <label>Room Price</label>
          <input type="text" name="e5" value="<?php echo $row['RPRICE']; ?>" />
        </div>



        <input class="submit" type="submit" name="updatebtn" value="update" />

      </form>
  <?php
  }
}
  ?>
    </div>
