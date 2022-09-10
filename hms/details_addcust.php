<?php

include 'headers/headercustdetails.php';

if (isset($_POST['addbtn'])) {

  include "databaseconfig/config.php";


  $CUST_NAME = $_POST["t1"];
  $CUST_ADDRESS = $_POST["t2"];
  $CUST_EMAIL = $_POST["t3"];
  $CUST_PHONE = $_POST["t4"];



  $sql = "Insert into customer(CUST_NAME,CUST_ADDRESS,CUST_EMAIL,CUST_PHONE) values('$CUST_NAME','$CUST_ADDRESS','$CUST_EMAIL','$CUST_PHONE')";

  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

  //header("Location: http://localhost/hms/customer.php");

  mysqli_close($conn);
}
?>



<div id="main-content">
  <h2>Enter your details</h2>

  <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="form-group">
      <label>Customer Name</label>
      <input type="text" name="t1" />
    </div>



    <div class="form-group">
      <label>Customer Address</label>
      <input type="text" name="t2" />
    </div>


    <div class="form-group">
      <label>Customer Email</label>
      <input type="text" name="t3" />
    </div>

    <div class="form-group">
      <label>Customer Number</label>
      <input type="text" name="t4" />
    </div>

    <input class="submit" type="submit" name="addbtn" value="add" />

  </form>

  <div id="main-content">
    <?php
    include 'databaseconfig/config.php';

    if (isset($CUST_NAME)) {

      $sql = "SELECT * FROM customer where CUST_NAME='$CUST_NAME'";
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    }
    ?>

    <?php
    if (isset($CUST_NAME)) {

      if (mysqli_num_rows($result) > 0) {

    ?>

        <h2>Your details</h2>
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
                  <a href='details_deletecust.php?CUST_ID=<?php echo $row['CUST_ID']; ?>'>Delete</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

        <center><a href='details_room.php'>
          <input class="submit" type="submit"  value="Book room" />
          </a ></center>

    <?php }
    }
    //else{
    //  echo "<h2>No Records Found</h2>";
    //}

    ?>
  </div>
</div>
</body>

</html>
</div>
</div>
