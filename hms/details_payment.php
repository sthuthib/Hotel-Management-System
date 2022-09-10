<?php
include 'headers/headerpaymentdetails.php';
if (isset($_POST['addbtn'])) {

  include "databaseconfig/config.php";
  $CUST_ID = $_POST["t1"];
  $sql = "SELECT * FROM payment where CUST_ID='$CUST_ID'";
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
    <input class="submit" type="submit" name="addbtn" value="add" />
  </form>

  <?php
  if (isset($CUST_ID)) {

    if (mysqli_num_rows($result) > 0) {

  ?>
      <table cellpadding="7px">
        <thead>
          <th>PAY_ID </th>
          <th>CUST_ID</th>
          <th>PAY_DATE</th>
          <th>PAY_AMT</th>
          <th>PAY_TYPE</th>

        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?php echo $row['PAY_ID']; ?></td>
              <td><?php echo $row['CUST_ID']; ?></td>
              <td><?php echo $row['PAY_DATE']; ?></td>
              <td><?php echo $row['PAY_AMT']; ?></td>
              <td><?php echo $row['PAY_TYPE']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php
      include "databaseconfig/config.php";
      $CUST_ID = $_POST["t1"];
      $sql = "SELECT payment.PAY_AMT,reservation.DAYS_RANGE,payment.PAY_AMT*reservation.DAYS_RANGE AS total FROM payment,reservation where payment.CUST_ID= reservation.CUST_ID AND reservation.CUST_ID='$CUST_ID'; ";
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
          echo "Room Price per day with GST " . $row["PAY_AMT"] . "<br>";
          echo "The total amt to be paid after calculating the number of days: Rs." . $row["total"] . "<br>";
        }
      } else {
        echo "0 results";
      }
      mysqli_close($conn);
      ?>

  <?php } else {
      echo "<h2>No Records Found</h2>";
    }
  } else {
    echo "<h2>No Records Found</h2>";
  }
  ?>


</div>
</body>
<style>
    body {
      background-image: url('images/hotelpay.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
      filter: blur(8px);
    }
  </style>
</html>