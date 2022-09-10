<?php
include 'headers/headercust.php';
if (isset($_POST['updatebtn'])) {
  $CUST_ID  = $_POST["e1"];
  $CUST_NAME = $_POST["e2"];
  $CUST_ADDRESS  = $_POST["e3"];
  $CUST_EMAIL  = $_POST["e4"];
  $CUST_PHONE = $_POST["e5"];

  include 'databaseconfig/config.php';
  $sql = "UPDATE CUSTOMER SET CUST_NAME = '{$CUST_NAME}', CUST_ADDRESS = '{$CUST_ADDRESS}',CUST_EMAIL = '{$CUST_EMAIL}',CUST_PHONE = '{$CUST_PHONE}' WHERE CUST_ID = '{$CUST_ID}'";
  header("Location: http://localhost/hms/crud_customer.php");
  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
  header("Location: http://localhost/hms/crud_customer.php");
  mysqli_close($conn);
}
?>

<?php
  include 'databaseconfig/config.php';
  $CUST_ID = $_GET['CUST_ID'];
  $sql = "SELECT * FROM CUSTOMER WHERE CUST_ID = '$CUST_ID'";
  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

    <div id="main-content">
      <h2>Update Record</h2>
      <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="form-group">
          <label>Customer ID</label>
          <input type="text" name="e1" value="<?php echo $row['CUST_ID']; ?>" />
        </div>

        <div class="form-group">
          <label>Customer Name</label>
          <input type="text" name="e2" value="<?php echo $row['CUST_NAME']; ?>" />
        </div>

        <div class="form-group">
          <label>Customer Address</label>
          <input type="text" name="e3" value="<?php echo $row['CUST_ADDRESS']; ?>" />
        </div>

        <div class="form-group">
          <label>Customer Email</label>
          <input type="text" name="e4" value="<?php echo $row['CUST_EMAIL']; ?>" />
        </div>

        <div class="form-group">
          <label>Customer Number</label>
          <input type="text" name="e5" value="<?php echo $row['CUST_PHONE']; ?>" />
        </div>

        <input class="submit" type="submit" name="updatebtn" value="update" />

      </form>
  <?php
  }
}
  ?>
    </div>