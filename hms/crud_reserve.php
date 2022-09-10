<?php
include 'headers/headerreserve.php';
?>
<div id="main-content">
  <h2>All Records of Reservation</h2>
  <?php
  include 'databaseconfig/config.php';
  $sql = "call display_reservationbyorder";
  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
  if (mysqli_num_rows($result) > 0) {
  ?>
    <table cellpadding="7px">
      <thead>
        <th>RESERVE_ID</th>
        <th>CUST_ID</th>
        <th>ROOM_ID</th>
        <th>RESERVE_DATE</th>
        <th>CHECK_IN</th>
        <th>CHECK_OUT</th>
        <th>DAYS_RANGE</th>

      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row['RESERVE_ID']; ?></td>
            <td><?php echo $row['CUST_ID']; ?></td>
            <td><?php echo $row['ROOM_ID']; ?></td>
            <td><?php echo $row['RESERVE_DATE']; ?></td>
            <td><?php echo $row['CHECK_IN']; ?></td>
            <td><?php echo $row['CHECK_OUT']; ?></td>
            <td><?php echo $row['DAYS_RANGE']; ?></td>

            <td>
              <a href='updatereserve.php?RESERVE_ID=<?php echo $row['RESERVE_ID']; ?>'>Edit</a>
              <a href='deletereserve.php?RESERVE_ID=<?php echo $row['RESERVE_ID']; ?>'>Delete</a>
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