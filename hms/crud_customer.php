<?php
include 'headers/headercust.php';
?>
<div id="main-content">
  <h2>All Records of Customers</h2>
  <?php
  include 'databaseconfig/config.php';
  $sql = "SELECT * FROM customer ";
  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
  if (mysqli_num_rows($result) > 0) {
  ?>
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
              <a href='updatecust.php?CUST_ID=<?php echo $row['CUST_ID']; ?>'>Edit</a>
              <a href='deletecust.php?CUST_ID=<?php echo $row['CUST_ID']; ?>'>Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } else {
    echo "<h2>No Records Found</h2>";
  }
  mysqli_close($conn);
  ?>
</div>
</div>
</body>
</html>