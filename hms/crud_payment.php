<?php
include 'headers/headerpayment.php';
?>
<div id="main-content">
  <h2>All Records of Payment</h2>
  <?php
  include 'databaseconfig/config.php';

  $sql = "SELECT * FROM PAYMENT ";
  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

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

            <td>
              <a href='updatepayment.php?PAY_ID=<?php echo $row['PAY_ID']; ?>'>Edit</a>
              <a href='deletepayment.php?PAY_ID=<?php echo $row['PAY_ID']; ?>'>Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } else {
    echo "<h2>No Record Found</h2>";
  }
  mysqli_close($conn);
  ?>
</div>
</div>
</body>

</html>