<?php
include 'headers/headertransaction.php';
?>
<div id="main-content">
  <h2>All Records of Transaction</h2>
  <?php
  include 'databaseconfig/config.php';

  $sql = "SELECT * FROM TRANSACTIONS ";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

  if (mysqli_num_rows($result) > 0) {
  ?>
    <table cellpadding="7px">
      <thead>
        <th>TRANSACTION_ID</th>
        <th>TRANSACTION_NAME</th>
        <th>CUST_ID</th>
        <th>RESERVE_ID</th>
        <th>EMP_ID</th>
        <th>TRANSACTION_DATE</th>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row['TRANSACTION_ID']; ?></td>
            <td><?php echo $row['TRANSACTION_NAME']; ?></td>
            <td><?php echo $row['CUST_ID']; ?></td>
            <td><?php echo $row['RESERVE_ID']; ?></td>
            <td><?php echo $row['EMP_ID']; ?></td>
            <td><?php echo $row['TRANSACTION_DATE']; ?></td>

            <td>
              <a href='updatetransaction.php?TRANSACTION_ID=<?php echo $row['TRANSACTION_ID']; ?>'>Edit</a>
              <a href='deletetransaction.php?TRANSACTION_ID=<?php echo $row['TRANSACTION_ID']; ?>'>Delete</a>
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