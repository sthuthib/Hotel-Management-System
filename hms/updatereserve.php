<?php

include 'headers/headerreserve.php';

if (isset($_POST['updatebtn'])) {

  //include "config.php";

  $RESERVE_ID = $_POST["e1"];
  $CUST_ID = $_POST["e2"];
  $ROOM_ID = $_POST["e3"];
  $RESERVE_DATE = $_POST["e4"];
  $CHECK_IN = $_POST["e5"];
  $CHECK_OUT = $_POST["e6"];
  $DAYS_RANGE = $_POST["e7"];


  include 'databaseconfig/config.php';


  $sql = "UPDATE RESERVATION SET CUST_ID = '{$CUST_ID}', ROOM_ID = '{$ROOM_ID}',RESERVE_DATE = '{$RESERVE_DATE}',CHECK_IN = '{$CHECK_IN}',CHECK_OUT = '{$CHECK_OUT}',DAYS_RANGE = '{$DAYS_RANGE}' WHERE RESERVE_ID  = '{$RESERVE_ID}'";

  header("Location: http://localhost/hms/crud_reserve.php");

  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

  header("Location: http://localhost/hms/crud_reserve.php");

  mysqli_close($conn);
}
?>



<?php
include 'databaseconfig/config.php';

$RESERVE_ID = $_GET['RESERVE_ID'];



$sql = "SELECT * FROM RESERVATION WHERE RESERVE_ID = '$RESERVE_ID'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
?>

    <div id="main-content">
      <h2>Update Record</h2>
      <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="form-group">
          <label>Reservation Id</label>
          <input type="text" name="e1" value="<?php echo $row['RESERVE_ID']; ?>" />
        </div>

        <div class="form-group">
          <label>Customer Id</label>
          <input type="text" name="e2" value="<?php echo $row['CUST_ID']; ?>" />
        </div>

        <div class="form-group">
          <label>Room Id</label>
          <input type="text" name="e3" value="<?php echo $row['ROOM_ID']; ?>" />
        </div>

        <div class="form-group">
          <label>Reservation Date</label>
          <input type="date" name="e4" placeholder="yyyy-mm-dd" value="<?php echo $row['RESERVE_DATE']; ?>" />
        </div>

        <div class="form-group">
          <label>Check in</label>
          <input type="date" name="e5" placeholder="yyyy-mm-dd" value="<?php echo $row['CHECK_IN']; ?>" />
        </div>

        <div class="form-group">
          <label>Check Out</label>
          <input type="date" name="e6" placeholder="yyyy-mm-dd" value="<?php echo $row['CHECK_OUT']; ?>" />
        </div>

        <div class="form-group">
          <label>Days Range</label>
          <input type="text" name="e7" value="<?php echo $row['DAYS_RANGE']; ?>" />
        </div>


        <input class="submit" type="submit" name="updatebtn" value="update" />

      </form>
  <?php
  }
}
  ?>
    </div>
