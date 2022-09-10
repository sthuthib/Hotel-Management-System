<?php

include 'headers/headerpayment.php';

if (isset($_POST['updatebtn'])) {

  //include "config.php";

  $PAY_ID = $_POST["e1"];
  $CUST_ID = $_POST["e2"];
  $PAY_DATE = $_POST["e3"];
  $PAY_AMT = $_POST["e4"];
  $PAY_TYPE = $_POST["e5"];


  include 'databaseconfig/config.php';

  //$sql = "UPDATE student SET SNAME = '$SNAME', ADDRESS = '$ADDRESS', PHONE = '$PHONE',GENDER = '$GENDER' WHERE USN = '$USN'";
  //or
  $sql = "UPDATE PAYMENT SET CUST_ID = '{$CUST_ID}', PAY_DATE = '{$PAY_DATE}', PAY_AMT = '{$PAY_AMT}',PAY_TYPE  = '{$PAY_TYPE}' WHERE PAY_ID = '{$PAY_ID}'";

  header("Location: http://localhost/hms/crud_payment.php");

  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

  header("Location: http://localhost/hms/crud_payment.php");

  mysqli_close($conn);
}
?>
<?php
include 'databaseconfig/config.php';

$PAY_ID = $_GET['PAY_ID'];

//$sql = "SELECT * FROM student WHERE USN = {$usn}";

$sql = "SELECT * FROM PAYMENT WHERE PAY_ID = '$PAY_ID'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
?>

    <div id="main-content">
      <h2>Update Record</h2>
      <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="form-group">
          <label>Payment Id</label>
          <input type="text" name="e1" value="<?php echo $row['PAY_ID']; ?>" />
        </div>

        <div class="form-group">
          <label>Customer Id</label>
          <input type="text" name="e2" value="<?php echo $row['CUST_ID']; ?>" />
        </div>

        <div class="form-group">
          <label>Payment Date</label>
          <input type="date" name="e3" placeholder="yyyy-mm-dd" value="<?php echo $row['PAY_DATE']; ?>" />
        </div>

        <div class="form-group">
          <label>Pay Amount</label>
          <input type="text" name="e4" value="<?php echo $row['PAY_AMT']; ?>" />
        </div>

        <div class="form-group">
          <label>Payment Type</label>
          <input type="text" name="e5" value="<?php echo $row['PAY_TYPE']; ?>" />
        </div>

        <input class="submit" type="submit" name="updatebtn" value="update" />
      </form>
  <?php
  }
}
  ?>
    </div>
