<?php
include 'headers/headerroom.php';
?>
<div id="main-content">
  <h2>All Records of Room</h2>
  <?php
  include 'databaseconfig/config.php';

  $sql = "SELECT * FROM ROOM ";
  // $sql = "CALL display_studentrecods";
  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

  if (mysqli_num_rows($result) > 0) {
  ?>
    <table cellpadding="7px">
      <thead>
        <th>ROOM_ID</th>
        <th>ROOM_TYPE</th>
        <th>ROOM_BED</th>
        <th>ROOM_MEAL</th>
        <th>RPRICE</th>

      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row['ROOM_ID']; ?></td>
            <td><?php echo $row['ROOM_TYPE']; ?></td>
            <td><?php echo $row['ROOM_BED']; ?></td>
            <td><?php echo $row['ROOM_MEAL']; ?></td>
            <td><?php echo $row['RPRICE']; ?></td>

            <td>
              <a href='updateroom.php?ROOM_ID=<?php echo $row['ROOM_ID']; ?>'>Edit</a>
              <a href='deleteroom.php?ROOM_ID=<?php echo $row['ROOM_ID']; ?>'>Delete</a>
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