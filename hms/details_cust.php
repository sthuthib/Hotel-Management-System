<?php
include 'headers/headercustdetails.php';
if (isset($_POST['addbtn'])) {
  include "databaseconfig/config.php";
  $CUST_ID = $_POST["t1"];
  $sql = "SELECT * FROM customer where CUST_ID='$CUST_ID'";
  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
  mysqli_close($conn);
}
?>
<div id="main-content">
  <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
      <label>CUSTOMER ID</label>
      <input type="text" name="t1" />
    </div>
    <input class="submit" type="submit" name="addbtn" value="Ok" />
  </form>
  <?php
  if (isset($CUST_ID)) {
    if (mysqli_num_rows($result) > 0) {
  ?>
      <h2>Your Details</h2>
      <table cellpadding="7px">
        <thead>
          <th>CUST_ID</th>
          <th>CUST_NAME</th>
          <th>CUST_ADDRESS</th>
          <th>CUST_EMAIL</th>
          <th>CUST_PHONE</th>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?php echo $row['CUST_ID']; ?></td>
              <td><?php echo $row['CUST_NAME']; ?></td>
              <td><?php echo $row['CUST_ADDRESS']; ?></td>
              <td><?php echo $row['CUST_EMAIL']; ?></td>
              <td><?php echo $row['CUST_PHONE']; ?></td>
              <td>
                <a href='details_updatecust.php?CUST_ID=<?php echo $row['CUST_ID']; ?>'>Edit</a>
                <a href='details_deletecust.php?CUST_ID=<?php echo $row['CUST_ID']; ?>'>U+007F</a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
  <?php } else {
      echo "<h2>No Records Found</h2>";
    }
  } //else {
    //echo "<h2>No Records Found</h2>";
  //}
  ?>
</div>
</body>
</html>