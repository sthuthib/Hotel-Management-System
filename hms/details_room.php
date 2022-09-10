<?php
include 'headers/headerroomdetails.php';
?>
<div id="main-content">
  <h2>Rooms available </h2>
  <?php
  include 'databaseconfig/config.php';

  $sql = "SELECT * FROM ROOM ";
  
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