<?php

include 'headers/headertransaction.php';

if (isset($_POST['updatebtn'])) {

  //include "config.php";

  $TRANSACTION_ID = $_POST["e1"];
  $TRANSACTION_NAME = $_POST["e2"];
  $CUST_ID = $_POST["e3"];
  $RESERVE_ID = $_POST["e4"];
  $EMP_ID = $_POST["e5"];
  $TRANSACTION_DATE = $_POST["e6"];

  include 'databaseconfig/config.php';

  //$sql = "UPDATE student SET SNAME = '$SNAME', ADDRESS = '$ADDRESS', PHONE = '$PHONE',GENDER = '$GENDER' WHERE USN = '$USN'";
  //or
  $sql = "UPDATE TRANSACTIONS SET TRANSACTION_NAME = '{$TRANSACTION_NAME}', CUST_ID = '{$CUST_ID}', RESERVE_ID = '{$RESERVE_ID}',EMP_ID = '{$EMP_ID}',TRANSACTION_DATE = '{$TRANSACTION_DATE}' WHERE TRANSACTION_ID = '{$TRANSACTION_ID}'";

  header("Location: http://localhost/hms/crud_transaction.php");

  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

  header("Location: http://localhost/hms/crud_transaction.php");

  mysqli_close($conn);
}
?>



<?php
include 'databaseconfig/config.php';

$TRANSACTION_ID = $_GET['TRANSACTION_ID'];

//$sql = "SELECT * FROM student WHERE USN = {$usn}";

$sql = "SELECT * FROM TRANSACTIONS WHERE TRANSACTION_ID = '$TRANSACTION_ID'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
?>

    <div id="main-content">
      <h2>Update Record</h2>
      <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="form-group">
          <label>TRANSACTION ID</label>
          <input type="text" name="e1" value="<?php echo $row['TRANSACTION_ID']; ?>" />
        </div>

        <div class="form-group">
          <label>TRANSACTION NAME</label>
          <input type="text" name="e2" value="<?php echo $row['TRANSACTION_NAME']; ?>" />
        </div>

        <div class="form-group">
          <label>CUSTOMER ID</label>
          <input type="text" name="e3" value="<?php echo $row['CUST_ID']; ?>" />
        </div>

        <div class="form-group">
          <label>RESERVATION ID</label>
          <input type="text" name="e4" value="<?php echo $row['RESERVE_ID']; ?>" />
        </div>

        <div class="form-group">
          <label>EMPLOYEE ID</label>
          <input type="text" name="e5" value="<?php echo $row['EMP_ID']; ?>" />
        </div>

        <div class="form-group">
          <label>TRANSACTION DATE</label>
          <input type="text" name="e6" value="<?php echo $row['TRANSACTION_DATE']; ?>" />
        </div>

        <input class="submit" type="submit" name="updatebtn" value="update" />
      </form>
  <?php
  }
}
  ?>
    </div>
